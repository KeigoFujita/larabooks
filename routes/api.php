<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::as('api.')->group(function () {
    Route::post('login', 'API\Auth\LoginController@login')->name('login');
    Route::post('register', 'API\Auth\RegisterController@register')->name('login');

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('logout', 'API\Auth\LoginController@logout')->name('logout');
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        //Book
        Route::apiResource('books', 'API\APIBookController');

        //Categories
        Route::apiResource('categories', 'API\APICategoryController');

        //Authors
        Route::apiResource('authors', 'API\APIAuthorController');
    });
});
