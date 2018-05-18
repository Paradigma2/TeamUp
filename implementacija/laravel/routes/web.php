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
Route::get('adminLobby', function () {
    return view('adminLobby');
});
Route::get('modLobby', function () {
    return view('modLobby');
});
Route::get('userLobby', function () {
    return view('userLobby');
});
Route::get('registerForm', function () {
    return view('registerForm');
});
Route::get('guestLobby', function () {
    return view('guestLobby');
});



Route::get('admin', function () {
    return view('profile/profileAdmin');
});



Route::get('editArticle', function () {
    return view('editArticle');

});

Route::get('articles', function () {
    return view('articles');
});
Route::get('profile', function () {
    return view('profile');
});


Route::get('/', function () {
    return view('main');
});


