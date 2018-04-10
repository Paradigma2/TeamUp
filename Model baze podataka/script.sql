-- Create tables section -------------------------------------------------

-- Table User

CREATE TABLE `User`
(
  `UserID` Int NOT NULL,
  `Username` Varchar(20) NOT NULL,
  `Password` Varchar(20) NOT NULL,
  `Online` Bool NOT NULL,
  `isAdmin` Bool NOT NULL,
  `isMod` Bool NOT NULL,
  `LoLNick` Varchar(20) NOT NULL,
  `Lvl` Int NOT NULL,
  `Age` Int,
  `Grade` Double,
  `Description` Text,
  `Icon` Varchar(50),
  `RankID` Int NOT NULL
)
;

CREATE INDEX `IX_Relationship1` ON `User` (`RankID`)
;

ALTER TABLE `User` ADD PRIMARY KEY (`UserID`)
;

-- Table Rank

CREATE TABLE `Rank`
(
  `RankID` Int NOT NULL,
  `Name` Varchar(20) NOT NULL
)
;

ALTER TABLE `Rank` ADD PRIMARY KEY (`RankID`)
;

-- Table Message

CREATE TABLE `Message`
(
  `MessageID` Int NOT NULL,
  `UserFromID` Int NOT NULL,
  `UserToID` Int NOT NULL,
  `Content` Text NOT NULL,
  `Time` Timestamp NOT NULL
)
;

CREATE INDEX `IX_Relationship3` ON `Message` (`UserFromID`)
;

CREATE INDEX `IX_Relationship4` ON `Message` (`UserToID`)
;

ALTER TABLE `Message` ADD PRIMARY KEY (`MessageID`)
;

-- Table Follow

CREATE TABLE `Follow`
(
  `UserID` Int NOT NULL,
  `UserFollowedID` Int NOT NULL
)
;

CREATE INDEX `IX_Relationship5` ON `Follow` (`UserID`)
;

CREATE INDEX `IX_Relationship6` ON `Follow` (`UserFollowedID`)
;

ALTER TABLE `Follow` ADD PRIMARY KEY (`UserFollowedID`,`UserID`)
;

-- Table Comment

CREATE TABLE `Comment`
(
  `CommentID` Int NOT NULL,
  `Content` Text,
  `Grade` Int NOT NULL,
  `Time` Timestamp NOT NULL,
  `UserID` Int NOT NULL,
  `UserCommentingID` Int NOT NULL
)
;

CREATE INDEX `IX_Relationship7` ON `Comment` (`UserID`)
;

CREATE INDEX `IX_Relationship8` ON `Comment` (`UserCommentingID`)
;

ALTER TABLE `Comment` ADD PRIMARY KEY (`CommentID`)
;

-- Table Article

CREATE TABLE `Article`
(
  `ArticleID` Int NOT NULL,
  `Headline` Varchar(100) NOT NULL,
  `Content` Text NOT NULL,
  `Time` Timestamp NOT NULL,
  `Image` Varchar(50),
  `UserID` Int NOT NULL
)
;

CREATE INDEX `IX_Relationship9` ON `Article` (`UserID`)
;

ALTER TABLE `Article` ADD PRIMARY KEY (`ArticleID`)
;

-- Table Block

CREATE TABLE `Block`
(
  `UserID` Int NOT NULL,
  `UserBlockedID` Int NOT NULL
)
;

CREATE INDEX `IX_Relationship10` ON `Block` (`UserID`)
;

CREATE INDEX `IX_Relationship11` ON `Block` (`UserBlockedID`)
;

ALTER TABLE `Block` ADD PRIMARY KEY (`UserID`,`UserBlockedID`)
;

-- Table Ban

CREATE TABLE `Ban`
(
  `UserID` Int NOT NULL,
  `Username` Varchar(20) NOT NULL,
  `LoLNick` Varchar(20) NOT NULL
)
;

ALTER TABLE `Ban` ADD PRIMARY KEY (`UserID`)
;

-- Table Ad

CREATE TABLE `Ad`
(
  `AdID` Int NOT NULL,
  `Description` Text,
  `Time` Timestamp NOT NULL,
  `UserID` Int NOT NULL,
  `PositionID` Int NOT NULL,
  `ModeID` Int NOT NULL,
  `MasteryID1` Int NOT NULL,
  `MasteryID2` Int,
  `MasteryID3` Int
)
;

CREATE INDEX `IX_Relationship12` ON `Ad` (`UserID`)
;

CREATE INDEX `IX_Relationship18` ON `Ad` (`PositionID`)
;

CREATE INDEX `IX_Relationship19` ON `Ad` (`ModeID`)
;

CREATE INDEX `IX_Relationship21` ON `Ad` (`MasteryID1`)
;

CREATE INDEX `IX_Relationship22` ON `Ad` (`MasteryID2`)
;

CREATE INDEX `IX_Relationship23` ON `Ad` (`MasteryID3`)
;

ALTER TABLE `Ad` ADD PRIMARY KEY (`AdID`)
;

-- Table Champion

CREATE TABLE `Champion`
(
  `ChampID` Int NOT NULL,
  `Name` Varchar(20) NOT NULL,
  `Icon` Varchar(50) NOT NULL
)
;

ALTER TABLE `Champion` ADD PRIMARY KEY (`ChampID`)
;

-- Table Mastery

CREATE TABLE `Mastery`
(
  `MasteryID` Int NOT NULL,
  `MasteryLvl` Int NOT NULL,
  `MasteryPoints` Double NOT NULL,
  `UserID` Int NOT NULL,
  `ChampID` Int NOT NULL
)
;

CREATE INDEX `IX_Relationship17` ON `Mastery` (`UserID`)
;

CREATE INDEX `IX_Relationship20` ON `Mastery` (`ChampID`)
;

ALTER TABLE `Mastery` ADD PRIMARY KEY (`MasteryID`)
;

-- Table Position

CREATE TABLE `Position`
(
  `PositionID` Int NOT NULL,
  `Name` Varchar(20) NOT NULL
)
;

ALTER TABLE `Position` ADD PRIMARY KEY (`PositionID`)
;

-- Table Mode

CREATE TABLE `Mode`
(
  `ModeID` Int NOT NULL,
  `Name` Varchar(20) NOT NULL
)
;

ALTER TABLE `Mode` ADD PRIMARY KEY (`ModeID`)
;

-- Create foreign keys (relationships) section ------------------------------------------------- 


ALTER TABLE `User` ADD CONSTRAINT `Relationship1` FOREIGN KEY (`RankID`) REFERENCES `Rank` (`RankID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Message` ADD CONSTRAINT `Relationship3` FOREIGN KEY (`UserFromID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Message` ADD CONSTRAINT `Relationship4` FOREIGN KEY (`UserToID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Follow` ADD CONSTRAINT `Relationship5` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Follow` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`UserFollowedID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Comment` ADD CONSTRAINT `Relationship7` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Comment` ADD CONSTRAINT `Relationship8` FOREIGN KEY (`UserCommentingID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Article` ADD CONSTRAINT `Relationship9` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Block` ADD CONSTRAINT `Relationship10` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Block` ADD CONSTRAINT `Relationship11` FOREIGN KEY (`UserBlockedID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Ad` ADD CONSTRAINT `Relationship12` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Mastery` ADD CONSTRAINT `Relationship17` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Ad` ADD CONSTRAINT `Relationship18` FOREIGN KEY (`PositionID`) REFERENCES `Position` (`PositionID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Ad` ADD CONSTRAINT `Relationship19` FOREIGN KEY (`ModeID`) REFERENCES `Mode` (`ModeID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Mastery` ADD CONSTRAINT `Relationship20` FOREIGN KEY (`ChampID`) REFERENCES `Champion` (`ChampID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Ad` ADD CONSTRAINT `Relationship21` FOREIGN KEY (`MasteryID1`) REFERENCES `Mastery` (`MasteryID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Ad` ADD CONSTRAINT `Relationship22` FOREIGN KEY (`MasteryID2`) REFERENCES `Mastery` (`MasteryID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


ALTER TABLE `Ad` ADD CONSTRAINT `Relationship23` FOREIGN KEY (`MasteryID3`) REFERENCES `Mastery` (`MasteryID`) ON DELETE RESTRICT ON UPDATE RESTRICT
;