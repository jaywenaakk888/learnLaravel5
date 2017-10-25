<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;
use Redis;
class RedisController extends Controller {

	/**
	 * redis test
	 *
	 * @return Response
	 */
	public function run()
	{
		$key = 'articles:title';
		
		$articles = Article::all();
		foreach ($articles as $article) {
			//将文章标题存放到集合中
			Redis::sadd($key,$article->title);
		}
		
		//获取集合元素总数(如果指定键不存在返回0)
		$nums = Redis::scard($key);
		
		if($nums>0){
			//从指定集合中随机获取三个标题
			$article_titles = Redis::srandmember($key,3);
			dd($article_titles);
		}
		

	}


}
