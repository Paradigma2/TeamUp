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
use  App\Http\Controllers\CreateEditAdForm;


Route::resource('users','UserController');
Route::get('proba', 'UserController@proba');

Route::get('home', 'UserController@home');
Route::post('registerUser','UserController@registerUser');
Route::post('makeArticle','ArticleController@makeArticle');
Route::get('searchUserByName','UserController@searchUserByName');
Route::get('guestLobby','UserController@showGuestLobby');
Route::get('articles', 'ArticleController@showArticles');
Route::get('createArticle', 'ArticleController@createArticle');
Route::post('deleteArticle', 'ArticleController@deleteArticle');
Route::post('deleteArticleAdmin', 'ArticleController@deleteArticleAdmin');
Route::get('editArticle', 'ArticleController@editArticle');
Route::get('registerForm', 'UserController@registerForm');
Route::post('updateArticle', 'ArticleController@updateArticle');
Route::get('logOut', 'SessionController@destroy');

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

Route::get('createEditAdForm','UserController@openFormCreateAd');
Route::get('search', 'AdController@search');
Route::post('registerUser','UserController@registerUser');
Route::post('deleteAd','UserController@deleteAd');
Route::get('anotherUser', 'UserController@anotherUser');
Route::get('another', 'UserController@redirectoAnotherUser');
Route::post('blokirajKorisnika', 'UserController@blokirajKorisnika');
Route::post('odblokirajKorisnika', 'UserController@odblokirajKorisnika');

Route::post('udaljiSaSajta','UserController@udaljiSaSajta');
Route::post('obrisiNalog','UserController@obrisiNalog');
Route::get('zapratiKor','UserController@zapratiKorisnika');
Route::get('obrisiKom','UserController@obrisiKom');
Route::get('unaprediKor','UserController@unaprediKorisnika');
Route::post('oceniKorisnika', 'UserController@oceniKorisnika');
Route::post('slanjePoruke', 'UserController@slanjePoruke');
Route::get('showFormAd', 'CreateEditAdController@showFormAd');
Route::post('createAd', 'CreateEditAdController@createAd');
Route::get('showUser','UserController@showUser');
//  Route::get('ads','CreateEditAdController@showFormAd');
