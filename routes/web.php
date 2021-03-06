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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PagesController@top')->name('top');

Route::get('/term', 'PagesController@term');

Route::get('/policy', 'PagesController@policy');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
//Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('register/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/mypage', 'HomeController@mypage');

Route::post('/content/add', 'ContentsController@create');

Route::post('/content/like', 'ContentsController@like');

Route::post('/content/unlike', 'ContentsController@unlike');

Route::post('/content/get_like_user', 'ContentsController@get_like_user');

Route::get('/comment/{content_id}', 'CommentController@index');

Route::post('/comment/add', 'CommentController@create');

Route::post('/content/delete', 'ContentsController@destroy');

Route::post('/content/edit', 'ContentsController@update');

Route::post('/comment/delete', 'CommentController@destroy');
