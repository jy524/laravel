<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table='Article';

    public $timestamps=false;

    public function author(){
    	return $this->hasOne('App\home\Author','id','author_id');
    }

    public function comment(){
    	return $this->hasMany('App\Home\comment','article_id','id');
    }

    // 多对多的关联模型方法
    public function tag(){
    	return $this->belongsToMany('App\Home\Tag','relation','article_id','tag_id');
    }
}
