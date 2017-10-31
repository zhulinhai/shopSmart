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

Route::get('validate_code/create', 'API\ValidateController@create');
Route::post('validate_phone/send', 'API\ValidateController@sendSMS');
Route::post('upload/{type}', 'API\UploadController@uploadFile');

Route::post('register', 'API\MemberController@register');
Route::post('login', 'API\MemberController@login');

Route::get('category/parent_id/{parent_id}', 'API\BookController@getCategoryByParentId');
Route::get('cart/add/{product_id}', 'API\CartController@addCart');
Route::get('cart/delete', 'API\CartController@deleteCart');

Route::post('alipay', 'API\PayController@aliPay');
Route::post('wxpay', 'API\PayController@wxPay');

Route::post('pay/ali_notify', 'API\PayController@aliNotify');
Route::get('pay/ali_result', 'API\PayController@aliResult');
Route::get('pay/ali_merchant', 'API\PayController@aliMerchant');

Route::post('pay/wx_notify', 'API\PayController@wxNotify');
