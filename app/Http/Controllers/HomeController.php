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

        $contents = \App\Content::all();
        //dd($contents);
        return view('home', compact('contents'));
    }

    public function mypage()
    {
      return view('mypage');
    }
}
