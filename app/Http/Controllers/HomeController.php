<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\film;
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
        //fetch data from films table
        $films=film::paginate(5);
        //sent fil,s table data to view
        return view('home',compact('films'));
    }
}
