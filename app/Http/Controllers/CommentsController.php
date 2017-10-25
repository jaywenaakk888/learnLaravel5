<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Comment;
use Redirect,Input;

class CommentsController extends Controller {

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			'nickname' => 'required|max:255',
			'email' => 'required|email',
			'website' => 'required|max:255',
			'content' => 'required'
		]);
		$comment = new Comment;
		$comment->nickname = Input::get('nickname');
		$comment->email = Input::get('email');
		$comment->website = Input::get('website');
		$comment->content = Input::get('content');
		$comment->article_id = Input::get('article_id');
		if($comment->save()){
			return Redirect::back();
		}else{
			return Redirect::back()->withInput()->withErrors('评论发表失败！');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
