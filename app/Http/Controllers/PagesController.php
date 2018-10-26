<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\film;
use App\comment;
use DB;
class PagesController extends Controller
{
	public function index(){
		
		$comments=comment::all();

		$films=film::paginate(1);
        return view('welcome', compact('films','comments'));
		
		}
	
}
