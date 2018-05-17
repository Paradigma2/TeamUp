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
<<<<<<< HEAD
Route::get('admin', function () {
    return view('profile/profileAdmin');
});


Route::get('prof', function () {
    return view('profile/profileUser');
=======
Route::get('editArticle', function () {
    return view('editArticle');
>>>>>>> 7da8a340598f0e373e758ea4fe4c6756a82d606c
});

Route::get('articles', function () {
    return view('articles');
});
Route::get('profile', function () {
    return view('profile');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('main');
});


