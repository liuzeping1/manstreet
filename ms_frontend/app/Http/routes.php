<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/','ManstreetController@index');
//主页
Route::get('index','ManstreetController@index');
//登录
Route::get('login','LoginController@login');
//个人中心
Route::get('center','CenterController@center');
//购物车
Route::get('cart','CartController@cart');
//确认订单
Route::get('order','OrderController@order');
//商品列表页
Route::get('product','ProductController@product');
//注册
Route::get('register','RegisterController@register');
//商品详情页
Route::get('single','SingleController@single');

//注册接值
Route::any('into','RegisterController@into');
//发送短信验证码
Route::any('send_msg','RegisterController@send_msg');
//登录接值
Route::any('check_login','LoginController@check_login');
//修改密码
Route::any('pwd','CenterController@pwdUpdate');
//密码查询
Route::any('select','CenterController@pwdSel');
//修改密码不能重复
Route::any('update','CenterController@pwdUp');
//地址删除
Route::any('delete','CenterController@del');
//退出登录
Route::any('unset','CenterController@edit');

//商品分类页面    点击ajax更改不同分类下的商品
Route::get('updatelook','ProductController@updateReplace');
//商品分类页面到商品详情页面
Route::get('cate_order','OrderController@order');
//商品加入购物车
Route::get('addcart','CartController@addcart');
//文章页面
Route::get('article','ArticleController@index');
//加入购物车
Route::post('singleCart','SingleController@singleCart');
//删除购物车
Route::post('cart_remove','CartController@cart_remove');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
