<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;
use Input,Redirect,Auth;

class ArticlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			'title' => 'required|max:255|unique:articles',
			'body' => 'required|max:255',
		]);

		$articles = new Article;
		$articles->title = Input::get('title');
		$articles->image = Input::get('image');
		$articles->body = Input::get('body');
		$articles->user_id = Auth::user()->id;

		if($articles->save()){
			return Redirect::to('admin');
		}else{
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.articles.edit')->with('article',Article::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request,[
			'title' => 'required|max:255|unique:articles,title,'.$id,
			'body' => 'required|max:255',
		]);

		$articles = Article::find($id);
		$articles->title = Input::get('title');
		$articles->image = Input::get('image');
		$articles->body = Input::get('body');
		$articles->user_id = Auth::user()->id;

		if($articles->save()){
			return Redirect::to('admin');
		}else{
			return Redirect::back()->withInput()->withErrors('保存失败！');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$articles = Article::find($id);
		if($articles->delete()){
			return Redirect::to('admin');
		}
	}

}
