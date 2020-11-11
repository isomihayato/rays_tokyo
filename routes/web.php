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

Route::get('/','PagesController@index');
Route::get('/index','PagesController@index')->name('pages.index');
Route::get('/gallery','PagesController@gallery')->name('pages.gallery');
Route::get('/artists','PagesController@artists')->name('pages.artists');
Route::get('/blogs','PagesController@blogs')->name('pages.blogs');


Route::get('home','ToppagesController@index');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth'],['middleware' => ['manager']]], function () {
    Route::resource('users', 'UsersController', ['except' => ['show']]);
});


Route::resource('tattoos','TattoosController',['only' => [
  'index', 'create', 'update', 'store', 'destroy',
  ]])->middleware('auth');

Route::resource('articles','ArticlesController',['except' => ['show']])->middleware('auth');
Route::post('articles/postAccess','ArticlesController@postAccess')->name('articles.postAccess')->middleware('auth');
Route::get('articles/recruit','ArticlesController@recruit')->name('articles.recruit')->middleware(['auth','manager']);
Route::get('articles/sdcp','ArticlesController@sdcp')->name('articles.sdcp')->middleware(['auth','manager']);

Route::resource('categories','CategoriesController')->middleware(['auth','manager']);

Route::post('tattoos/index','TattoosController@index')->name('tattoos.index')->middleware('auth');
Route::get('tattoos/index','TattoosController@index')->name('tattoos.index')->middleware('auth');
Route::post('tattoos/arrange','TattoosController@arrange')->name('tattoos.arrange')->middleware('auth');

Route::resource('notices','NoticesController')->middleware('auth');
Route::post('notices/postAccess','NoticesController@postAccess')->name('notices.postAccess')->middleware('auth');
