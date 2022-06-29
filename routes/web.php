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
    Route::get('/view/{id}', ['as' => 'books.view', 'uses' => '\App\Http\Controllers\BooksController@view']);
    Route::get('create', ['as' => 'books.create', 'uses' => '\App\Http\Controllers\BooksController@create']);
    Route::post('store', ['as' => 'books.store', 'uses' => '\App\Http\Controllers\BooksController@store']);
    Route::get('delete/{id}', ['as' => 'books.delete', 'uses' => '\App\Http\Controllers\BooksController@delete']);
    Route::get('edit/{id}', ['as' => 'books.edit', 'uses' => '\App\Http\Controllers\BooksController@edit']);
    Route::put('update/{id}', ['as' => 'books.update', 'uses' => '\App\Http\Controllers\BooksController@update']);
});

Route::group(['prefix' => 'clients', 'where' => ['id' => '[0-9]+']], function () {
    Route::any('', ['as' => 'clients', 'uses' => '\App\Http\Controllers\ClientsController@index']);
    Route::get('create', ['as' => 'clients.create', 'uses' => '\App\Http\Controllers\ClientsController@create']);
    Route::post('store', ['as' => 'clients.store', 'uses' => '\App\Http\Controllers\ClientsController@store']);
    Route::get('delete/{id}', ['as' => 'clients.delete', 'uses' => '\App\Http\Controllers\ClientsController@delete']);
    Route::get('edit/{id}', ['as' => 'clients.edit', 'uses' => '\App\Http\Controllers\ClientsController@edit']);
    Route::put('update/{id}', ['as' => 'clients.update', 'uses' => '\App\Http\Controllers\ClientsController@update']);
});

Route::group(['prefix' => 'publishers', 'where' => ['id' => '[0-9]+']], function () {
    Route::any('', ['as' => 'publishers', 'uses' => '\App\Http\Controllers\PublishersController@index']);
    Route::get('create', ['as' => 'publishers.create', 'uses' => '\App\Http\Controllers\PublishersController@create']);
    Route::post('store', ['as' => 'publishers.store', 'uses' => '\App\Http\Controllers\PublishersController@store']);
    Route::get('delete/{id}', ['as' => 'publishers.delete', 'uses' => '\App\Http\Controllers\PublishersController@delete']);
    Route::get('edit/{id}', ['as' => 'publishers.edit', 'uses' => '\App\Http\Controllers\PublishersController@edit']);
    Route::put('update/{id}', ['as' => 'publishers.update', 'uses' => '\App\Http\Controllers\PublishersController@update']);
});

Route::group(['prefix' => 'categories', 'where' => ['id' => '[0-9]+']], function () {
    Route::any('', ['as' => 'categories', 'uses' => '\App\Http\Controllers\CategoriesController@index']);
    Route::get('create', ['as' => 'categories.create', 'uses' => '\App\Http\Controllers\CategoriesController@create']);
    Route::post('store', ['as' => 'categories.store', 'uses' => '\App\Http\Controllers\CategoriesController@store']);
    Route::get('delete/{id}', ['as' => 'categories.delete', 'uses' => '\App\Http\Controllers\CategoriesController@delete']);
    Route::get('edit/{id}', ['as' => 'categories.edit', 'uses' => '\App\Http\Controllers\CategoriesController@edit']);
    Route::put('update/{id}', ['as' => 'categories.update', 'uses' => '\App\Http\Controllers\CategoriesController@update']);
});

Route::group(['prefix' => 'purchases', 'where' => ['id' => '[0-9]+']], function () {
    Route::any('', ['as' => 'purchases', 'uses' => '\App\Http\Controllers\PurchasesController@index']);
    Route::get('create', ['as' => 'purchases.create', 'uses' => '\App\Http\Controllers\PurchasesController@create']);
    Route::post('store', ['as' => 'purchases.store', 'uses' => '\App\Http\Controllers\PurchasesController@store']);
    Route::get('delete/{id}', ['as' => 'purchases.delete', 'uses' => '\App\Http\Controllers\PurchasesController@delete']);
    Route::get('edit/{id}', ['as' => 'purchases.edit', 'uses' => '\App\Http\Controllers\PurchasesController@edit']);
    Route::put('update/{id}', ['as' => 'purchases.update', 'uses' => '\App\Http\Controllers\PurchasesController@update']);
});

Route::group(['prefix' => 'illustrators', 'where' => ['id' => '[0-9]+']], function () {
    Route::any('', ['as' => 'illustrators', 'uses' => '\App\Http\Controllers\IllustratorsController@index']);
    Route::get('create', ['as' => 'illustrators.create', 'uses' => '\App\Http\Controllers\IllustratorsController@create']);
    Route::post('store', ['as' => 'illustrators.store', 'uses' => '\App\Http\Controllers\IllustratorsController@store']);
    Route::get('delete/{id}', ['as' => 'illustrators.delete', 'uses' => '\App\Http\Controllers\IllustratorsController@delete']);
    Route::get('edit/{id}', ['as' => 'illustrators.edit', 'uses' => '\App\Http\Controllers\IllustratorsController@edit']);
    Route::put('update/{id}', ['as' => 'illustrators.update', 'uses' => '\App\Http\Controllers\IllustratorsController@update']);
});


