<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	public function hasManyComments(){
		return $this->hasMany('App\Comment','article_id','id');
	}

	public function belongsToUser(){
		return $this->belongsTo('App\User','user_id','id');
	}

}
