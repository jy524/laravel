<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;

class IndexController extends Controller
{
    //
    public function index(){
    	echo '分组的控制器方法Admin/Index/index';
    }

    // 练习db的使用
    public function add(){
    	$db=DB::table('person');
    	/*$res=$db->insert([
    		[
    			'name'=>'张三',
    			'age'=>22,
    			'sex'=>1
    		],
    		[
    			'name'=>'李四',
    			'age'=>32,
    			'sex'=>0
    		]
    	]);*/
    	/*$res=$db->insert([
    		'name'=>'王五',
    		'age'=>12,
    		'sex'=>2
    	]);*/
    	$res=$db->insertGetId([
    		'name'=>'赵柳',
    		'age'=>18,
    		'sex'=>18
    	]);
    	dd($res);
    	echo '增加';
    }

    public function update(){
    	$db=DB::table('person');
    	//$res=$db->where('id','=',7)->update(['sex'=>2]);
    	//$res=$db->where('sex','=',1)->increment('age',1);
    	$res=$db->where('age','>',18)->decrement('age',2);
    	dd($res);
    	echo '更新';
    }

    public function del(){
    	$db=DB::table('person');
    	$res=$db->where('id',3)->delete();
    	dd($res);
    	echo '删除';
    }

    public function select(){
    	$db=DB::table('person');
    	$list=$db->get();
    	/*foreach($list as $item){
    		echo 'id:'.$item->id.' name:'.$item->name.' sex:'.$item->sex.' age:'.$item->age.'<br/>';
    	}*/
    	//条件
    	//$list=$db->where('sex',1)->get();
    	//排序
		//$list=$db->orderBy('age','desc')->get();    	
    	//取出某个字段
    	$list=$db->where('id','>',1)->value('name');
    	//取出多个字段
    	//$list=$db->select('name','sex')->get();
    	//分页
    	//$list=$db->orderBy('age','desc')->offset(3)->limit(3)->get();
    	dd($list);
    	echo '查询';
    }

    // sql语句
    public function sql(){
    	$type=Input::get('type',1);
    	if($type==2){
    		// 增加
	    	$res=DB::insert("insert into person(name,age,sex) values('李红',18,:sex)",['sex'=>2]);
	    	dd($res);
    	}elseif($type==3){
    		//更新
    		$res=DB::update('update person set age=:age where name=:name',['age'=>22,'name'=>'李红']);
    		dd($res);
    	}elseif ($type==4) {
    		//删除
    		$res=DB::delete('delete from person where id=?',[8]);
    		echo '删除数据';
    		dd($res);
    	}else{
    		//查询
	    	$res=DB::select("select * from person where id=?",[1]);
	    	$list=DB::getQueryLog();
	    	var_dump($list);
    		dd($res);
    	}
    }

    // 使用Innodb引擎的事务回滚机制
    public function transaction(){
    	$res=DB::beginTransaction();
    	$id=Input::get('id',2);
    	$res=DB::update('update person set age=1 where id=:id',['id'=>$id]);
    	db::commit();
    	// db::rollback();
    }

    public function select2(){
    	$tb=DB::table('person');
    	/*$list=$tb->get();
    	//dd($list);

    	// 分块输出    	
    	$tb->orderBy('age','desc')->chunk(2,function($items){
    		return false;
    	});

    	// 获取某一列
    	$list=$tb->where('id',1)->first();
    	*/
    	$list=$tb->where('sex',1)->orWhere('age','>',18)->select('name')->addSelect('age')->groupBy('sex')->get();


    	dd($list);
    }
}
