<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class TestController extends Controller
{
    //
    public function index(){
    	echo '未分组的控制器方法Test/index';
    }

    public function params(){
    	//获取get方式请求的数据
    	Input::get('id',1);
    	//获取所有的数据
    	$all=Input::all('123');
    	//获取指定的数据
    	$only=Input::only(['id','name']);
    	//获取除去部分参数的数据
    	$except=Input::except(['id']);
    	//判断某个参数是否存在
    	$has=Input::has('sex');
    	dd($has);

    }
}
