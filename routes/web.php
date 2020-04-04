<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function(){

Route::get('/posts','PostController@index');
Route::get('/posts/create','PostController@create')->middleware('auth');
Route::post('/posts','PostController@store');
Route::GET('/posts/{post}/edit','PostController@edit');
Route::post('/posts/{post}/','PostController@update')->name('posts.update');
Route::get('/posts/{post}/delete','PostController@destroy');
Route::get('/posts/{post}','PostController@show');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');



//goooooooooooogle route

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');