<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
//使用模型
use App\Home\Person;

class IndexController extends Controller
{
    //
    public function index(){
    	echo '分组的控制其方法Home/Index/index';
    }

    public function page1(){
    	return view('Home.Index.page1');
    }

    public function page2(){
    	$data=[];
    	$data['name']='jy';
    	$data['age']=23;
    	$data['sex']='男';
    	return view('Home.Index.page2',$data);
    }

    public function page3(){
    	$name='李四';
    	$age=21;
    	$sex='女';
    	return view('Home.Index.page3',compact('name','sex','age'));
    }

    public function page4(){
    	$list=DB::table('person')->get();
    	return view('Home.Index.page4',compact('list'));
    }

    // csrf解决跨域访问
    public function page5(Request $request){
        if (Input::method()=="POST") {
            $this->validate($request,[
                'name'=>'required|min:2|max:20',
                'age'=>'required|min:1|max:100'
            ]);
            // 实例化模型使用
            /*$model=new Person();
            $model->name='历史';
            $model->age=12;
            $model->sex=2;
            $res=$model->save();*/

            dd(Person::create($request->all()));
            dd($res);
        }else{
            return view('home.Index.page5');
        }
    }

    //模型查询
    public function page6(){
        $res=Person::find(1)->toArray();
        $res=person::where('id',2)->first()->toArray();
        dd($res);
    }

    //模型更新
    public function page7(){
        $model=Person::find(1);
        $model->name='李红';
        $res=$model->save();
        dd($res);
    }

    //模型AR模式删除
    public function page8(){
        $model=Person::find(15);
        if($model){
            $res=$model->delete();
            dd($res);   
        }else{
            $this->error('数据不存在!');
        }
    }

    //文件上传
    public function page9(Request $request){
        if(Input::method()=='POST'){
            $file=$request->file('headimg');
            if($file->isValid()){
                $ext=$file->getClientOriginalExtension();
                $filename=time().rand(100,999).'.'.$ext;
                $res=$file->move('./upload',$filename);
                if($res){
                    $data=[
                        'name'=>'王丽',
                        'age'=>22,
                        'sex'=>1
                    ];
                    $data['headimg']='./upload/'.$filename;
                    $res=Person::create($data);
                    dd($res);
                }
            }
        }else{
            return view('Home.Index.page9');
        }
    }

    //分页
    public function page10(){
        $list=Person::where('sex',1)->paginate(2);
        return view('Home.Index.page10',compact('list'));
    }
}
