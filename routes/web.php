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

/***********************************后台相关***********************************/
Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::Post('categories/store', 'CategoriesController@store');
    Route::get('categories/{category}/destroy', 'CategoriesController@destroy');
    Route::Post('categories/{category}/upfile', 'CategoriesController@upfile');
    Route::resource('categories', 'CategoriesController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

    /* 产品管理 */
    Route::Post('products/store', 'ProductsController@store');
    Route::get('products/{product}/destroy', 'ProductsController@destroy');
    Route::resource('products', 'ProductsController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

    /* 商家管理 */
    Route::Post('merchants/store', 'MerchantsController@store');
    Route::resource('merchants', 'MerchantsController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

    /* 会员管理 */
    Route::Post('members/store', 'MembersController@store');
    Route::get('members/{member}/destroy', 'MembersController@destroy');
    Route::get('members/{member}/lock', 'MembersController@lock');
    Route::resource('members', 'MembersController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

    /* 文章创建、删除、列表展示等 */
    Route::Post('articles/store', 'ArticlesController@store');
    Route::get('articles/{article}/destroy', 'ArticlesController@destroy');
    Route::resource('articles', 'ArticlesController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

    /* 评论管理 */
    Route::Post('comments/store', 'CommentsController@store');
    Route::resource('comments', 'CommentsController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

    /* 订单管理 */
    Route::resource('orders', 'OrdersController', ['only' => ['index', 'show', 'create', 'update', 'edit', 'destroy']]);

});

Route::group(['prefix' => 'webapp'], function (){
    Route::get('/login', 'View\MemberController@toLogin');
    Route::get('/register', 'View\MemberController@toRegister');

    Route::get('/category', 'View\BookController@toCategory');
    Route::get('/product/category_id/{category_id}', 'View\BookController@toProduct');
    Route::get('/product/{product_id}', 'View\BookController@toPdtContent');

    Route::get('/cart', 'View\CartController@toCart');
});

Route::match(['get', 'post'], '/order_commit', 'View\OrderController@toOrderCommit')->middleware(['check.cart', 'check.weixin']);
Route::get('/order_list', 'View\OrderController@toOrderList')->middleware(['check.login']);