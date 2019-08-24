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

Route::get('/', function () {
    return view('welcome');
});

// get方式请求
Route::get('/test1', function () {
    echo '路由请求test1';
});

//post方式请求
Route::post('/test2',function(){
	echo 'post方式请求';
});

//match支持自定义多种请求方式
Route::match(['get','post','put'],'/test3',function(){
	echo 'match自定义方式请求';
});

//全部的请求方式
Route::any('/test4',function(){
	echo 'any支持所有的方式请求';
});

//路由参数,必须传递的参数
Route::any('/test5/{id}',function($id){
	echo 'any支持所有的方式请求'.$id;
});

//路由参数,必须传递的参数
Route::any('/test6/{id?}',function($id=''){
	echo '可选参数'.$id;
});

//群组的写法
Route::group(['prefix'=>'group'],function(){
	Route::any('test1',function(){
		echo '群组写法地址test1';
	})->name('jy123');
	Route::any('test2',function(){
		echo '群组写法地址test2';
	});
});

// 访问未分组的控制器方法
Route::group(['prefix'=>'Test'],function(){
	Route::get('index','TestController@index');
	Route::get('params','TestController@params');
});

//分组的控制器方法
Route::group(['prefix'=>'Home'],function(){
	Route::group(['prefix'=>'Index'],function(){
		Route::get('index','Home\IndexController@index');
	});
});
function RegPath($path='',$arr=[]){
	foreach ($arr as $k => $v) {
		Route::get($v,$path.$v);
	}
}
Route::group(['prefix'=>'Admin'],function(){
	Route::group(['prefix'=>'Index'],function(){
		Route::get('index','Admin\IndexController@index');
		Route::get('add','Admin\IndexController@add');
		Route::get('update','Admin\IndexController@update');
		Route::get('del','Admin\IndexController@del');
		Route::get('select','Admin\IndexController@select');
		Route::get('sql','Admin\IndexController@sql');
		Route::get('transaction','Admin\IndexController@transaction');
		Route::get('select2','Admin\IndexController@select2');
	});
});




