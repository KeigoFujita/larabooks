<?php

use Illuminate\Support\Facades\Auth;
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

Route::view('/my-devices', 'mydevices.index');

Route::group(['middleware' => ['auth']], function () {
    //Category
    Route::resource('categories', 'CategoryController');

    //Author
    Route::resource('authors', 'AuthorController');

    //Book
    Route::resource('books', 'BookController');
});
