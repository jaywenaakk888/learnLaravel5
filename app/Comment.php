<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	/**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['nickname', 'email', 'website', 'content', 'page_id','article_id'];
	
}
