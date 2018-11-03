<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class HomeController extends Controller
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
    public function index()
    {
        $contents = \App\Content::get_contents_data();
        return view('home', compact('contents'));
    }

    public function mypage()
    {
      $contents = \App\Content::get_contents_mydata();
      $sukeru = $contents['sukeru'];
      $my_contents = $contents['my_contents'];
      return view('mypage', compact('sukeru', 'my_contents'));
    }
}
