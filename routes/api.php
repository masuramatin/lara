<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List articles
Route::get('films', 'FilmController@index');

// List single article
Route::get('film/{id}', 'FilmController@show');

// Create new article
Route::post('film', 'FilmController@store');

// Update article
Route::put('film', 'FilmController@store');

// Delete article
Route::delete('film/{id}', 'FilmController@destroy');
