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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/categories','CategoryController');
Route::resource('/posts','postController');
Route::resource('/tags','tagsController');
Route::get('/trashed_posts', 'postController@trashed')->name('trashed.index');
Route::get('/trashed_posts/{id}', 'postController@restore')->name('restore.index');


Route::middleware(['auth','admin'])->group(function(){
    Route::get('/user', 'UserContoller@index')->name('users.index');
    Route::post('/user/{user}/make_admin', 'UserContoller@make_admin')->name('users.make_admin');

});

Route::middleware(['auth'])->group(function(){
    Route::get('/user/{user}/profile', 'UserContoller@profile')->name('users.profile');
    Route::post('/user/{user}/update', 'UserContoller@update')->name('users.update');
  //  Route::post('/user/{user}/make_admin', 'UserContoller@make_admin')->name('users.make_admin');

});
