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

Route::group(['prefix' => 'authors', 'where' => ['id' => '[0-9]+']], function () {
    Route::any('', ['as' => 'authors', 'uses' => '\App\Http\Controllers\AuthorsController@index']);
    Route::get('create', ['as' => 'authors.create', 'uses' => '\App\Http\Controllers\AuthorsController@create']);
    Route::post('store', ['as' => 'authors.store', 'uses' => '\App\Http\Controllers\AuthorsController@store']);
    Route::get('delete/{id}', ['as' => 'authors.delete', 'uses' => '\App\Http\Controllers\AuthorsController@delete']);
    Route::get('edit/{id}', ['as' => 'authors.edit', 'uses' => '\App\Http\Controllers\AuthorsController@edit']);
    Route::put('update/{id}', ['as' => 'authors.update', 'uses' => '\App\Http\Controllers\AuthorsController@update']);
});

Route::group(['prefix' => 'books', 'where' => ['id' => '[0-9]+']], function () {
    Route::any('', ['as' => 'books', 'uses' => '\App\Http\Controllers\BooksController@index']);
    Route::get('create', ['as' => 'books.create', 'uses' => '\App\Http\Controllers\BooksController@create']);
    Route::post('store', ['as' => 'books.store', 'uses' => '\App\Http\Controllers\BooksController@store']);
    Route::get('delete/{id}', ['as' => 'books.delete', 'uses' => '\App\Http\Controllers\BooksController@delete']);
    Route::get('edit/{id}', ['as' => 'books.edit', 'uses' => '\App\Http\Controllers\BooksController@edit']);
    Route::put('update/{id}', ['as' => 'books.update', 'uses' => '\App\Http\Controllers\BooksController@update']);
});

Route::get('clients', '\App\Http\Controllers\ClientsController@index');