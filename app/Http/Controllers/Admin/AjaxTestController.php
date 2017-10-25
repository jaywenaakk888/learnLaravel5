<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;
use Input,Redirect;
class AjaxTestController extends Controller {

	/**
	 * ajaxtest store.
	 *
	 * @return Response
	 */
	public function run(Request $request)
	{
		$articleId = Input::get('articleId');
		$article = Article::find($articleId);
		// $article->title = "title268";
		// $article->save();
		return $article;
		// return response()->json(array(
			
		// 	'status' => 1,

		// 	'msg' => 'ok',

		// 	));
	}



}
