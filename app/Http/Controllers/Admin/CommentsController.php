<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Comment;
use Redirect, Input;
use DB;

class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = DB::table('comments')->get();
		return view('admin.comments.index')->with('comments',$comments);
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
	public function store()
	{
		//
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
		return view('admin.comments.edit')->with('comment',Comment::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'nickname' => 'required',
			'content' => 'required',
		]);
		$comment = Comment::find($id);
		$comment->nickname = Input::get('nickname');
		$comment->email = Input::get('email');
		$comment->website = Input::get('website');
		$comment->content = Input::get('content');
		$comment->page_id = Input::get('page_id');
		if($comment->save()){
			return Redirect::to('admin/comments');
		}else{
			return Redirect::back()->withInput()->withErrors('更新失败！');
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
		$comment = Comment::find($id);
		if($comment->delete()){
			return Redirect::to('admin/comments');
		}
	}

}
