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
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tags', 'TagsController@index');
Route::get('/tags/new', 'TagsController@newTag');
Route::Post('/tags/new', 'TagsController@newTag');

Route::resource('acts', 'ActsController', [ 'only' => ['index', 'show', 'create',  'update', 'edit', 'destroy']]);
Route::Post('acts/store','ActsController@store');

Route::resource('merchants', 'MerchantsController', [ 'only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);
Route::Post('merchants/store','MerchantsController@store');

Route::resource('members', 'MembersController', [ 'only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);
Route::resource('articles', 'ArticlesController', [ 'only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);
Route::Post('articles/store','ArticlesController@store');