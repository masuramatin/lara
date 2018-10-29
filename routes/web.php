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


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PagesController@index');

Auth::routes();
Route::get('/Film', 'FilmController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/admin', 'FilmController@index');
Route::get('/Film/create', 'FilmController@create');
Route::post('/store', 'FilmController@store');
Route::get('edit/{id}','FilmController@edit');
Route::post('update/{id}', 'FilmController@update')->name('film.update');


Route::get('show/{id}','FilmController@show');
Route::get('destroy/{id}', 'FilmController@destroy')->name('film.destroy');

Route::get('/comment_insert', 'CommentController@create');
Route::post('/comment_store', 'CommentController@store');

Route::any("/Film/{slug}", array(
    "as"   => "Film",
    "uses" => "FilmController@getFilm"
));