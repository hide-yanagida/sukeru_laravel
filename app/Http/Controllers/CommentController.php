<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($content_id)
  {
      $data = \App\Comment::get_comments_data($content_id);

      $comments = $data['comments'];
      $content = $data['content'];

      return view('comment', compact('comments', 'content'));
  }

  public function create(Request $request)
  {
    $comment = new Comment;
    $comment->user_id = Auth::id();
    $comment->comment = $request->comment;
    $comment->content_id = $request->content_id;

    $comment->save();

    return redirect('/comment/'.$request->content_id);
  }
}
