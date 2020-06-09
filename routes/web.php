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

/*Route::get('/hello', function () {
    return "<h1>Hello world!</h1>";
});*/

/*Route::get('/users/{name}/{id}', function($name, $id){
    return 'This is user ' .$name.' with an id '.$id;
});*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/phpinfo', 'PagesController@info');

Route::resource('posts', 'PostsController');
Route::resource('comments', 'CommentsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/update', 'UserController@update_avatar');

Route::get('/verify/{token}','VerifyController@verify')->name('verify');
