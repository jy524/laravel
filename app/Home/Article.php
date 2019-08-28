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
}
