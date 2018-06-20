-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2018 at 03:33 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamup`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `mode_id` int(10) UNSIGNED NOT NULL,
  `mastery1_id` int(10) UNSIGNED NOT NULL,
  `mastery2_id` int(10) UNSIGNED DEFAULT NULL,
  `mastery3_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_user_id_foreign` (`user_id`),
  KEY `ad_position_id_foreign` (`position_id`),
  KEY `ad_mode_id_foreign` (`mode_id`),
  KEY `ad_mastery1_id_foreign` (`mastery1_id`),
  KEY `ad_mastery2_id_foreign` (`mastery2_id`),
  KEY `ad_mastery3_id_foreign` (`mastery3_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `headline` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `headline`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Vip napravio karticu za igrače LoL-a', 'Vip je jedini od tri mobilna operatara u našoj zemlji koji posvećuje posebnu pažnju gejming zajednici. Predstavili su posebnu ponudu u okviru njihove delatnosti  u vidu kartica za gejmere za akcentom na benefite u vidu bonus RP-a za League of Legends.\r\n            Danas je aktuelna ponuda Vip Gaming prepaidcard. Dakle u pitanju je prepaid kartica na koju uplaćujete kredit. Karticu je moguće kupiti u svim Vip centrima.\r\n            Kartica košta 500 dinara i kada je kupite dobijate dakle 500 dinara kredita i pored toga još 4 gigabajta interneta koji možete da iskoristite u roku od 7 dana kao i 350 RP-a. RP iz ove ponude važi samo za Europe Nordic and East server.\r\n            Ono što ovu ponudu čini još boljom jeste činjenica da kasnije kada već imate karticu svaki put kada uplatite 500 dinara ili više dobijate ponovo bonus od 350 RP-a.Ukoliko svi ovi Riot poeni iz bonusa nisu dovoljni i želite još više ove gejming valute možeš kupiti  preko Vipa i ova opcija je dostupna i drugim postpaid i prepaid Vip korisnicima. Cene su i ovde fantastične pa tako možete dobiti 350 RP-a za 350 dinara ili veći paket od 750 RP-a za 750 dinara.Kupovina je vrlo jednostavna i možete je obaviti preko svog mobilnog telefona bilo kada.', 2, '2018-06-19 22:00:00', '2018-06-19 22:00:00'),
(2, 'LoL Serbia powered by Asus zavrsni turnir', 'Zavrsni turnir pocinje u nedelju 8. oktobra 2017. godine tacno u podne tj u 12:00. Postoje male promene pravila posto se ne igra na Battlefy sajtu, procitajte ispod bracketa obavezno. Kako je mali broj igraca, mozete slobodno za sva pitanja nedoumice i sve sto vas zanima da pisete u inbox stranice, odgovaracu vam veoma brzo.\r\n            Pravila vaze ista kao i na svim dosadasnjim turnirima.Jedina razlika je sto se sada ne igra preko battlefy sajta pa nema tournament kodova vec rucno zovete protivnika u gejm. Napravite custom i zovite ga (moguce je da zovete protivnika i ako ga nemate u prijateljima, ako treba pomoc javite se u inbox). Od momenta kada dobijete protivnika imate 5 minuta da pocnete mec, ukoliko se vas protivnik ne pojavljuje napravite screenshot kada ste usli u custom i pozvali ga i uhvatite i sat na racunaru da se vidi i kada prodje pet minuta napravite jos jedan takav screenshot i posaljite u inbox facebook stranice\r\n            Posto se ne igra na battlefy sajtu morate vi sami da prijavite rezultate gejmova, dakle morate napraviti screenshot pobede i da posaljete u inbox stranice.\r\n           ', 2, '2018-06-19 22:00:00', '2018-06-19 22:00:00'),
(3, 'Svetski turnir zavrsen', 'Pobednici, tim Kliktech osvojili su nagradu od 5.000 evra, a drugoplasirani Bontech 3.000 evra. U borbi za treće mesto, tim x25 Esports je rezultatom 2 :1 pobedio tim RUR Esports i osvojio 1.500 evra dok je poraženi osvojio iznos od 500 evra.\r\n            Osim finansijske nagrade i prestiža, Kliktech  kao pobednik Vip Adria League powered by ESL iduće godine dobija direktnu pozivnicu za grupnu fazu takmičenju u ESL Southeast Europe Championshipu.\r\n            Komentar nakon pobede dao je Toni „Sacre“ Sabalić iz pobedničkog tima Klicktech, ujedno i MVP finalnog turnira: Kroz celo takmičenje smo bili na visokom nivou i završili smo ligu bez poraza. Puno mi znači osvajanje MVP nagrade jer sam u svom Zagrebu pokazao šta mogu. Veselimo se idućem izdanju Vip Adria Lige koja je organizovana bolje nego bilo koje drugo takmičenje do sada i drago mi je što i u Hrvatskoj možemo da vidimo ozbiljnu profesionalizaciju esports scene.\r\n           ', 2, '2018-06-19 22:00:00', '2018-06-19 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

DROP TABLE IF EXISTS `ban`;
CREATE TABLE IF NOT EXISTS `ban` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lolNick` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
CREATE TABLE IF NOT EXISTS `block` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `userBlocked_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `block_user_id_foreign` (`user_id`),
  KEY `block_userblocked_id_foreign` (`userBlocked_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `champion`
--

DROP TABLE IF EXISTS `champion`;
CREATE TABLE IF NOT EXISTS `champion` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `champion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `champion`
--

INSERT INTO `champion` (`id`, `name`, `icon`, `champion_id`, `created_at`, `updated_at`) VALUES
(1, 'Jax', 'slike/Jax.png', 24, NULL, NULL),
(2, 'Sona', 'slike/Sona.png', 37, NULL, NULL),
(3, 'Tristana', 'slike/Tristana.png', 18, NULL, NULL),
(4, 'Varus', 'slike/Varus.png', 110, NULL, NULL),
(5, 'Kaisa', 'slike/Kaisa.png', 145, NULL, NULL),
(6, 'Fiora', 'slike/Fiora.png', 114, NULL, NULL),
(7, 'Singed', 'slike/Singed.png', 27, NULL, NULL),
(8, 'TahmKench', 'slike/TahmKench.png', 223, NULL, NULL),
(9, 'Leblanc', 'slike/Leblanc.png', 7, NULL, NULL),
(10, 'Thresh', 'slike/Thresh.png', 412, NULL, NULL),
(11, 'Karma', 'slike/Karma.png', 43, NULL, NULL),
(12, 'Jhin', 'slike/Jhin.png', 202, NULL, NULL),
(13, 'Rumble', 'slike/Rumble.png', 68, NULL, NULL),
(14, 'Udyr', 'slike/Udyr.png', 77, NULL, NULL),
(15, 'LeeSin', 'slike/LeeSin.png', 64, NULL, NULL),
(16, 'Yorick', 'slike/Yorick.png', 83, NULL, NULL),
(17, 'Ornn', 'slike/Ornn.png', 516, NULL, NULL),
(18, 'Kayn', 'slike/Kayn.png', 141, NULL, NULL),
(19, 'Kassadin', 'slike/Kassadin.png', 38, NULL, NULL),
(20, 'Sivir', 'slike/Sivir.png', 15, NULL, NULL),
(21, 'MissFortune', 'slike/MissFortune.png', 21, NULL, NULL),
(22, 'Draven', 'slike/Draven.png', 119, NULL, NULL),
(23, 'Yasuo', 'slike/Yasuo.png', 157, NULL, NULL),
(24, 'Kayle', 'slike/Kayle.png', 10, NULL, NULL),
(25, 'Shaco', 'slike/Shaco.png', 35, NULL, NULL),
(26, 'Renekton', 'slike/Renekton.png', 58, NULL, NULL),
(27, 'Hecarim', 'slike/Hecarim.png', 120, NULL, NULL),
(28, 'Fizz', 'slike/Fizz.png', 105, NULL, NULL),
(29, 'KogMaw', 'slike/KogMaw.png', 96, NULL, NULL),
(30, 'Maokai', 'slike/Maokai.png', 57, NULL, NULL),
(31, 'Lissandra', 'slike/Lissandra.png', 127, NULL, NULL),
(32, 'Jinx', 'slike/Jinx.png', 222, NULL, NULL),
(33, 'Urgot', 'slike/Urgot.png', 6, NULL, NULL),
(34, 'Fiddlesticks', 'slike/Fiddlesticks.png', 9, NULL, NULL),
(35, 'Galio', 'slike/Galio.png', 3, NULL, NULL),
(36, 'Pantheon', 'slike/Pantheon.png', 80, NULL, NULL),
(37, 'Talon', 'slike/Talon.png', 91, NULL, NULL),
(38, 'Gangplank', 'slike/Gangplank.png', 41, NULL, NULL),
(39, 'Ezreal', 'slike/Ezreal.png', 81, NULL, NULL),
(40, 'Gnar', 'slike/Gnar.png', 150, NULL, NULL),
(41, 'Teemo', 'slike/Teemo.png', 17, NULL, NULL),
(42, 'Annie', 'slike/Annie.png', 1, NULL, NULL),
(43, 'Mordekaiser', 'slike/Mordekaiser.png', 82, NULL, NULL),
(44, 'Azir', 'slike/Azir.png', 268, NULL, NULL),
(45, 'Kennen', 'slike/Kennen.png', 85, NULL, NULL),
(46, 'Riven', 'slike/Riven.png', 92, NULL, NULL),
(47, 'Chogath', 'slike/Chogath.png', 31, NULL, NULL),
(48, 'Aatrox', 'slike/Aatrox.png', 266, NULL, NULL),
(49, 'Poppy', 'slike/Poppy.png', 78, NULL, NULL),
(50, 'Taliyah', 'slike/Taliyah.png', 163, NULL, NULL),
(51, 'Illaoi', 'slike/Illaoi.png', 420, NULL, NULL),
(52, 'Pyke', 'slike/Pyke.png', 555, NULL, NULL),
(53, 'Heimerdinger', 'slike/Heimerdinger.png', 74, NULL, NULL),
(54, 'Alistar', 'slike/Alistar.png', 12, NULL, NULL),
(55, 'XinZhao', 'slike/XinZhao.png', 5, NULL, NULL),
(56, 'Lucian', 'slike/Lucian.png', 236, NULL, NULL),
(57, 'Volibear', 'slike/Volibear.png', 106, NULL, NULL),
(58, 'Sejuani', 'slike/Sejuani.png', 113, NULL, NULL),
(59, 'Nidalee', 'slike/Nidalee.png', 76, NULL, NULL),
(60, 'Garen', 'slike/Garen.png', 86, NULL, NULL),
(61, 'Leona', 'slike/Leona.png', 89, NULL, NULL),
(62, 'Zed', 'slike/Zed.png', 238, NULL, NULL),
(63, 'Blitzcrank', 'slike/Blitzcrank.png', 53, NULL, NULL),
(64, 'Rammus', 'slike/Rammus.png', 33, NULL, NULL),
(65, 'Velkoz', 'slike/Velkoz.png', 161, NULL, NULL),
(66, 'Caitlyn', 'slike/Caitlyn.png', 51, NULL, NULL),
(67, 'Trundle', 'slike/Trundle.png', 48, NULL, NULL),
(68, 'Kindred', 'slike/Kindred.png', 203, NULL, NULL),
(69, 'Quinn', 'slike/Quinn.png', 133, NULL, NULL),
(70, 'Ekko', 'slike/Ekko.png', 245, NULL, NULL),
(71, 'Nami', 'slike/Nami.png', 267, NULL, NULL),
(72, 'Swain', 'slike/Swain.png', 50, NULL, NULL),
(73, 'Taric', 'slike/Taric.png', 44, NULL, NULL),
(74, 'Syndra', 'slike/Syndra.png', 134, NULL, NULL),
(75, 'Rakan', 'slike/Rakan.png', 497, NULL, NULL),
(76, 'Skarner', 'slike/Skarner.png', 72, NULL, NULL),
(77, 'Braum', 'slike/Braum.png', 201, NULL, NULL),
(78, 'Veigar', 'slike/Veigar.png', 45, NULL, NULL),
(79, 'Xerath', 'slike/Xerath.png', 101, NULL, NULL),
(80, 'Corki', 'slike/Corki.png', 42, NULL, NULL),
(81, 'Nautilus', 'slike/Nautilus.png', 111, NULL, NULL),
(82, 'Ahri', 'slike/Ahri.png', 103, NULL, NULL),
(83, 'Jayce', 'slike/Jayce.png', 126, NULL, NULL),
(84, 'Darius', 'slike/Darius.png', 122, NULL, NULL),
(85, 'Tryndamere', 'slike/Tryndamere.png', 23, NULL, NULL),
(86, 'Janna', 'slike/Janna.png', 40, NULL, NULL),
(87, 'Elise', 'slike/Elise.png', 60, NULL, NULL),
(88, 'Vayne', 'slike/Vayne.png', 67, NULL, NULL),
(89, 'Brand', 'slike/Brand.png', 63, NULL, NULL),
(90, 'Zoe', 'slike/Zoe.png', 142, NULL, NULL),
(91, 'Graves', 'slike/Graves.png', 104, NULL, NULL),
(92, 'Soraka', 'slike/Soraka.png', 16, NULL, NULL),
(93, 'Xayah', 'slike/Xayah.png', 498, NULL, NULL),
(94, 'Karthus', 'slike/Karthus.png', 30, NULL, NULL),
(95, 'Vladimir', 'slike/Vladimir.png', 8, NULL, NULL),
(96, 'Zilean', 'slike/Zilean.png', 26, NULL, NULL),
(97, 'Katarina', 'slike/Katarina.png', 55, NULL, NULL),
(98, 'Shyvana', 'slike/Shyvana.png', 102, NULL, NULL),
(99, 'Warwick', 'slike/Warwick.png', 19, NULL, NULL),
(100, 'Ziggs', 'slike/Ziggs.png', 115, NULL, NULL),
(101, 'Kled', 'slike/Kled.png', 240, NULL, NULL),
(102, 'Khazix', 'slike/Khazix.png', 121, NULL, NULL),
(103, 'Olaf', 'slike/Olaf.png', 2, NULL, NULL),
(104, 'TwistedFate', 'slike/TwistedFate.png', 4, NULL, NULL),
(105, 'Nunu', 'slike/Nunu.png', 20, NULL, NULL),
(106, 'Rengar', 'slike/Rengar.png', 107, NULL, NULL),
(107, 'Bard', 'slike/Bard.png', 432, NULL, NULL),
(108, 'Irelia', 'slike/Irelia.png', 39, NULL, NULL),
(109, 'Ivern', 'slike/Ivern.png', 427, NULL, NULL),
(110, 'MonkeyKing', 'slike/MonkeyKing.png', 62, NULL, NULL),
(111, 'Ashe', 'slike/Ashe.png', 22, NULL, NULL),
(112, 'Kalista', 'slike/Kalista.png', 429, NULL, NULL),
(113, 'Akali', 'slike/Akali.png', 84, NULL, NULL),
(114, 'Vi', 'slike/Vi.png', 254, NULL, NULL),
(115, 'Amumu', 'slike/Amumu.png', 32, NULL, NULL),
(116, 'Lulu', 'slike/Lulu.png', 117, NULL, NULL),
(117, 'Morgana', 'slike/Morgana.png', 25, NULL, NULL),
(118, 'Nocturne', 'slike/Nocturne.png', 56, NULL, NULL),
(119, 'Diana', 'slike/Diana.png', 131, NULL, NULL),
(120, 'AurelionSol', 'slike/AurelionSol.png', 136, NULL, NULL),
(121, 'Zyra', 'slike/Zyra.png', 143, NULL, NULL),
(122, 'Viktor', 'slike/Viktor.png', 112, NULL, NULL),
(123, 'Cassiopeia', 'slike/Cassiopeia.png', 69, NULL, NULL),
(124, 'Nasus', 'slike/Nasus.png', 75, NULL, NULL),
(125, 'Twitch', 'slike/Twitch.png', 29, NULL, NULL),
(126, 'DrMundo', 'slike/DrMundo.png', 36, NULL, NULL),
(127, 'Orianna', 'slike/Orianna.png', 61, NULL, NULL),
(128, 'Evelynn', 'slike/Evelynn.png', 28, NULL, NULL),
(129, 'RekSai', 'slike/RekSai.png', 421, NULL, NULL),
(130, 'Lux', 'slike/Lux.png', 99, NULL, NULL),
(131, 'Sion', 'slike/Sion.png', 14, NULL, NULL),
(132, 'Camille', 'slike/Camille.png', 164, NULL, NULL),
(133, 'MasterYi', 'slike/MasterYi.png', 11, NULL, NULL),
(134, 'Ryze', 'slike/Ryze.png', 13, NULL, NULL),
(135, 'Malphite', 'slike/Malphite.png', 54, NULL, NULL),
(136, 'Anivia', 'slike/Anivia.png', 34, NULL, NULL),
(137, 'Shen', 'slike/Shen.png', 98, NULL, NULL),
(138, 'JarvanIV', 'slike/JarvanIV.png', 59, NULL, NULL),
(139, 'Malzahar', 'slike/Malzahar.png', 90, NULL, NULL),
(140, 'Zac', 'slike/Zac.png', 154, NULL, NULL),
(141, 'Gragas', 'slike/Gragas.png', 79, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci,
  `grade` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `userCommenting_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_user_id_foreign` (`user_id`),
  KEY `comment_usercommenting_id_foreign` (`userCommenting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `user1_read` tinyint(4) NOT NULL,
  `user2_read` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `conversation_user1_id_user2_id_unique` (`user1_id`,`user2_id`),
  KEY `conversation_user2_id_foreign` (`user2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `userFollowed_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `follow_user_id_foreign` (`user_id`),
  KEY `follow_userfollowed_id_foreign` (`userFollowed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mastery`
--

DROP TABLE IF EXISTS `mastery`;
CREATE TABLE IF NOT EXISTS `mastery` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `points` bigint(20) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `champion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mastery_user_id_foreign` (`user_id`),
  KEY `mastery_champion_id_foreign` (`champion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `conversation_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_user_id_foreign` (`user_id`),
  KEY `message_conversation_id_foreign` (`conversation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2018_05_30_193938_create_rank_table', 1),
(30, '2018_05_30_194109_create_user_table', 1),
(31, '2018_05_30_212609_create_champion_table', 1),
(32, '2018_05_30_212808_create_mode_table', 1),
(33, '2018_05_30_212855_create_position_table', 1),
(34, '2018_05_30_213033_create_mastery_table', 1),
(35, '2018_05_30_213628_create_follow_table', 1),
(36, '2018_05_30_213812_create_comment_table', 1),
(37, '2018_05_30_214117_create_block_table', 1),
(38, '2018_05_30_214211_create_ban_table', 1),
(39, '2018_05_30_214320_create_article_table', 1),
(40, '2018_05_30_214501_create_ad_table', 1),
(41, '2018_06_02_100023_create_conversation_table', 1),
(42, '2018_06_02_105610_create_message_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

DROP TABLE IF EXISTS `mode`;
CREATE TABLE IF NOT EXISTS `mode` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Summoners Rift', NULL, NULL),
(2, 'Twistet Treeline', NULL, NULL),
(3, 'Aram', NULL, NULL),
(4, 'Featured', NULL, NULL),
(5, 'Custom Game', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ADC', NULL, NULL),
(2, 'Support', NULL, NULL),
(3, 'Top', NULL, NULL),
(4, 'Jungle', NULL, NULL),
(5, 'Mid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BRONZE I', NULL, NULL),
(2, 'BRONZE II', NULL, NULL),
(3, 'BRONZE III', NULL, NULL),
(4, 'BRONZE IV', NULL, NULL),
(5, 'BRONZE V', NULL, NULL),
(6, 'SILVER I', NULL, NULL),
(7, 'SILVER II', NULL, NULL),
(8, 'SILVER III', NULL, NULL),
(9, 'SILVER IV', NULL, NULL),
(10, 'SILVER V', NULL, NULL),
(11, 'GOLD I', NULL, NULL),
(12, 'GOLD II', NULL, NULL),
(13, 'GOLD III', NULL, NULL),
(14, 'GOLD IV', NULL, NULL),
(15, 'GOLD V', NULL, NULL),
(16, 'PLATINUM I', NULL, NULL),
(17, 'PLATINUM II', NULL, NULL),
(18, 'PLATINUM III', NULL, NULL),
(19, 'PLATINUM IV', NULL, NULL),
(20, 'PLATINUM V', NULL, NULL),
(21, 'DIAMOND I', NULL, NULL),
(22, 'DIAMOND II', NULL, NULL),
(23, 'DIAMOND III', NULL, NULL),
(24, 'DIAMOND IV', NULL, NULL),
(25, 'DIAMOND V', NULL, NULL),
(26, 'MASTER I', NULL, NULL),
(27, 'CHALLENGER I', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online` tinyint(4) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  `isMod` tinyint(4) NOT NULL,
  `lolNick` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `grade` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_rank_id_foreign` (`rank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `online`, `isAdmin`, `isMod`, `lolNick`, `level`, `age`, `grade`, `description`, `icon`, `rank_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jana', '$2y$10$cJ.yHmvHaPZWyCsn1tWCIuP1bskvszwmquHYD1rei6sQHfnqZMAxq', 0, 1, 0, 'fjara', 41, NULL, NULL, NULL, 'slike/icons/3398.png', 7, NULL, NULL, NULL),
(2, 'lemi', '$2y$10$KVke/RNHAQWDvoxqblQuYezE.rDK/0Yn3/rOiPFJJ3sErePVcP4.u', 0, 0, 1, 'darkknightkaca', 60, NULL, NULL, NULL, 'slike/icons/774.png', 14, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_mastery1_id_foreign` FOREIGN KEY (`mastery1_id`) REFERENCES `mastery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ad_mastery2_id_foreign` FOREIGN KEY (`mastery2_id`) REFERENCES `mastery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ad_mastery3_id_foreign` FOREIGN KEY (`mastery3_id`) REFERENCES `mastery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ad_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `mode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ad_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ad_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `block_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `block_userblocked_id_foreign` FOREIGN KEY (`userBlocked_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_usercommenting_id_foreign` FOREIGN KEY (`userCommenting_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversation_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follow_userfollowed_id_foreign` FOREIGN KEY (`userFollowed_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mastery`
--
ALTER TABLE `mastery`
  ADD CONSTRAINT `mastery_champion_id_foreign` FOREIGN KEY (`champion_id`) REFERENCES `champion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mastery_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `rank` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
