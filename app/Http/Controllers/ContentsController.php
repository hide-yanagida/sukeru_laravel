<?php

namespace App\Http\Controllers;

use App\Content;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Validator;

class ContentsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
      // バリデーションルール(jpeg, png, bmp, gif, or svg)
      // $rules = [
      //     'file' => 'image|max:5000'
      // ];

      //$validation = Validator::make($request, $rules);


      //入力フォームの値をDBに保存
      $content = new Content;
      $content->overview = $request->overview;
      $content->place = $request->place;
      $content->date_from = strtotime($request->date_from);
      $content->date_to = strtotime($request->date_to);
      $content->user_id = Auth::id();
      $content->save();

      //fileの投稿がある時、file保存の処理をする。
      $filename = '';
      if ($request->file('image')->isValid()) {
        //fileをcontentのidにリネームして保存
        $guessExtension = $request->file('image')->guessExtension();
        $filename = $content->id.'.'.$guessExtension;
        $file = $request->file('image')
                        ->storeAs('public', $filename);
      }

      $content->filename = $filename;
      $content->save();

      return redirect('/home');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
      //
  }

  public function like(Request $request)
  {
    $like = new Like;
    $like->user_id =  Auth::id();
    $like->content_id = $request->content_id;
    $like->save();

    return '';
  }

  public function unlike(Request $request)
  {

/*
    DB::table('likes')
    ->where('user_id', Auth::id())
    ->where('content_id', $request->content_id)
    ->delete();
*/
    $deleteRows = \App\Like::where('user_id', Auth::id())
                            ->where('content_id', $request->content_id)
                            ->delete();
    return '';
  }
}
