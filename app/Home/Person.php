<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //表名
    protected $table="Person";

    //主键
    protected $primaryKey="id";

    //定义禁止操作时间
    public $timestamps=false;

    //允许入库的字段
    protected $fullable=['id','name','age','sex'];

    //不允许入库的字段
    protected $guarded=[];

    //隐藏数据表中的字段
    protected $hidden=['id'];
}
