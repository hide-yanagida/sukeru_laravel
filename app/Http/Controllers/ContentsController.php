<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      $content = new Content;
      $content->overview = $request->overview;
      $content->place = $request->place;
      $content->date_from = strtotime($request->date_from);
      $content->date_to = strtotime($request->date_to);
      $content->user_id = Auth::id();

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
}
