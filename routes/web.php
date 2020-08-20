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


Route::view('/books', 'book.index');
Route::view('/books/create', 'book.create');
Route::view('/books/edit', 'book.edit');
Route::view('/books/show', 'book.show');

// Route::view('/categories', 'category.index');
// Route::view('/categories/create', 'category.create');
// Route::view('/categories/edit', 'category.edit');


// Route::view('/authors', 'author.index');
// Route::view('/authors/create', 'author.create');
// Route::view('/authors/edit', 'author.edit');


Route::view('/my-devices', 'mydevices.index');



//Category

Route::resource('categories', 'CategoryController');


//Author
Route::resource('authors', 'AuthorController');
