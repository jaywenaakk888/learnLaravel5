<?php namespace App\Http\Controllers;
use App\Article;
use DB;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = DB::table('articles')->select('articles.id','articles.title','users.name')->leftJoin('users','articles.user_id','=','users.id')->where('users.id','>','0')->paginate(10);
		// $articles = DB::table('articles')->leftjoin('users',function($join){
		// 	$join->on('articles.user_id','=','users.id')->where('users.id','>','1');
		// })->get();
		// $articles->setPath('/laravel/public/home');
		return view('home')->with('articles',$articles);
	}

}
