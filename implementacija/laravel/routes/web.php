<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('users','UserController');

Route::get('showUserLobby', 'UserController@showUserLobby');
Route::post('registerUser','UserController@registerUser');
Route::post('makeArticle','ArticleController@makeArticle');
Route::get('searchUserByName','UserController@searchUserByName');
Route::get('guestLobby','UserController@showGuestLobby');
Route::get('articles', 'ArticleController@showArticles');
Route::get('createArticle', 'ArticleController@createArticle');
Route::post('deleteArticle', 'ArticleController@deleteArticle');
Route::get('editArticle', 'ArticleController@editArticle');
Route::get('registerForm', 'UserController@registerForm');
Route::post('updateArticle', 'ArticleController@updateArticle');
Route::get('logOut', 'UserController@logOut');

Route::get('searchModerator', function () {
    return view('search/searchModerator');
});
Route::get('searchUser', function () {
    return view('search/searchUser');
});
Route::get('search', function () {
    return view('search/search');
});

Route::get('adminLobby', function () {
    return view('adminLobby');
});
Route::get('modLobby', function () {
    return view('modLobby');
});
Route::get('userLobby', function () {
    return view('userLobby');
});


Route::get('createEditAdForm', function () {
    return view('profile/forms/createEditAdForm');
});



Route::get('inboxAdmin', function () {
    return view('inbox/inboxAdmin');
});

Route::get('inboxModerator', function () {
    return view('inbox/inboxModerator');
});

Route::get('inboxUser', function () {
    return view('inbox/inboxUser');
});

Route::get('moderator', function () {
    return view('profile/profileModerator');
});

Route::get('admin', function () {
    return view('profile/profileAdmin');
});

Route::get('userAnotherModerator', function () {
    return view('profile/profileAnotherUserModerator');
});

Route::get('userAnother', function () {
    return view('profile/profileAnotherUser');
});

Route::get('user', function () {
    return view('profile/profileUser');
});




Route::get('profile', function () {
    return view('profile');
});

Route::get('/', function () {
    return view('main');
});


Route::post('editDescription','UserController@editDescription');
Route::post('changePassword','UserController@changePassword');      
Route::post('login','SessionController@create');
Route::get('logout','SessionController@destroy');
Route::get('/home','UserController@home');//ove stavi na guest lobby

Route::get('search', 'AdController@search');
Route::post('registerUser','UserController@registerUser');
Route::post('deleteAd','UserController@deleteAd');


