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


Route::get('novaporuka', 'MessageController@novaporuka');


Route::get('home', 'LobbyController@home');
Route::post('registerUser','LobbyController@registerUser');
Route::post('makeArticle','ArticleController@makeArticle');
Route::get('searchUserByName','LobbyController@searchUserByName');
Route::get('/','LobbyController@showGuestLobby');
Route::get('articles', 'ArticleController@showArticles');
Route::get('createArticle', 'ArticleController@createArticle');
Route::post('deleteArticle', 'ArticleController@deleteArticle');
Route::post('deleteArticleAdmin', 'ArticleController@deleteArticleAdmin');
Route::get('editArticle', 'ArticleController@editArticle');
Route::get('registerForm', 'LobbyController@registerForm');
Route::post('updateArticle', 'ArticleController@updateArticle');
Route::get('logOut', 'SessionController@destroy');




Route::post('editDescription','UserController@editDescription');
Route::post('changePassword','UserController@changePassword');      
Route::post('login','SessionController@create');

Route::get('createEditAdForm','UserController@openFormCreateAd');
Route::get('search', 'AdController@showSearch');
Route::get('searchAds', 'AdController@search');
Route::get('inbox', 'MessageController@show');
Route::post('sendMessage', 'MessageController@post');

Route::post('deleteAd','UserController@deleteAd');
Route::get('anotherUser', 'UserController@anotherUser');
Route::get('another', 'UserController@redirectoAnotherUser');
Route::post('blokirajKorisnika', 'UserController@blokirajKorisnika');
Route::post('odblokirajKorisnika', 'UserController@odblokirajKorisnika');
Route::get('odustaniOglas', 'UserController@odustaniOglas');
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