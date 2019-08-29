<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
//使用模型
use App\Home\Person;
use App\Home\Author;
use App\Home\Article;

use Session;
use Cache;


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

    //使用验证码
    public function page11(Request $request){
        if(Input::method()=='POST'){
            $this->validate($request,[
                "name"=>'required',
                'code'=>'required|captcha',
                'captcha'=>'required|captcha'
            ]);
        }else{
            return view('Home.Index.page11');
        }
    }

    // 使用session
    public function page12(){
         //设置session数据
        Session::put('name','jy');

        // 获取session数据
        $name=Session::get('name');
        var_dump($name);
        

        //获取session的全部数据
        var_dump(Session::all());
        
        // 清空数据
        // Session::flush();

        var_dump(Session::has('name'));
        //移除数据
        Session::remove('name');
        var_dump(Session::has('name'));
        
        
        dd(Session::all());
    }

    // 使用缓存，缓存时长以分钟为单位
    public function page13(){
        echo "<h1>缓存的熟悉与使用</h1>";
        // 设置缓存信息
        /*cache::put('name','jy',1);

        cache::add('age',12,5);
        cache::add('age',13,2);

        cache::forever('sex',1);

        // 获取数据
        echo cache::get('name');
        echo '<br/>';
        echo cache::get('like','篮球');
        echo '<br/>';
        echo cache::get('subject',function(){
            $arr=['语文','数学','英语'];
            return implode(',', $arr);
        });
        echo '<br/>';
        //echo cache::pull('name');
        echo '<br/>';
        echo cache::get('name','没有了');

        //删除数据
        $info=cache::get('age');
        // cache::forget('age');
        // dd(cache::get('age'));

        echo cache::get('name').'-'.cache::get('age').'-'.cache::get('sex');

        //全部清空
        cache::flush();


        //获取一个缓存数据，不存在则写入
        $a=Cache::remember('love',10,function(){
            return 'Hello world';
        });
        echo cache::get('love');*/

        //自增
        cache::add('visit_num',1,10);
        cache::add('goods_num',100,10);
        cache::increment('visit_num',1);
        cache::decrement('goods_num',2);

    }

    // 连表查询
    public function page14(){
        $list=DB::table('article as at')->leftJoin('author as au','at.author_id','au.id')->select('at.*','au.name')->orderBy('at.id','desc')->get();
        dd($list);
    }

    //一对一的模型关联查询
    public function page15(){
        $list=Article::all();
        foreach($list as $item){
            echo $item->id.':'.$item->title.'-'.$item->author->name.'<br/>';
        }
    }

    // 一对多的模型关联查询
    public function page16(){
        $list=Article::where('id','>',1)->get();
        foreach($list as $k=>$v){
            echo $v->id.':'.$v->title.'<br/>';
            foreach ($v->comment as $k2 => $v2) {
                if($k2==0){
                    echo '评论:';
                }
                echo '&nbsp;&nbsp;&nbsp;'.$v2->content.'<br/>';
            }
        }
    }

    //多对多的模型关联查询
    public function page17(){
        $list=Article::get();
        foreach ($list as $k => $v) {
            echo $v->id.':'.$v->title.'(标签有这些)<br/>';
            foreach ($v->tag as $k2 => $v2) {
                echo '&emsp;'.$v2->id.':'.$v2->tag.'<br/>';
            }
        }
    }

    public function page18(){
        
    }
}
