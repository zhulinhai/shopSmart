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

Route::Post('tags/store','TagsController@store');
Route::get('tags/{tag}/destroy','TagsController@destroy');
Route::Post('tags/{tag}/upfile','TagsController@upfile');
Route::resource('tags', 'TagsController', [ 'only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

Route::Post('acts/store','ActsController@store');
Route::resource('acts', 'ActsController', [ 'only' => ['index', 'show', 'create',  'update', 'edit', 'destroy']]);

Route::Post('merchants/store','MerchantsController@store');
Route::resource('merchants', 'MerchantsController', [ 'only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

/* 会员管理 */
Route::Post('members/store','MembersController@store');
Route::Post('members/{member}/upfile','MembersController@upfile');
Route::get('members/getfile/{filename}','MembersController@getfile');
Route::get('members/{member}/destroy','MembersController@destroy');
Route::get('members/{member}/lock','MembersController@lock');
Route::resource('members', 'MembersController', [ 'only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

/* 文章创建、删除、列表展示等 */
Route::Post('articles/store','ArticlesController@store');
Route::get('articles/{article}/destroy','ArticlesController@destroy');
Route::resource('articles', 'ArticlesController', [ 'only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

/* 评论管理 */
Route::resource('comments', 'CommentsController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);