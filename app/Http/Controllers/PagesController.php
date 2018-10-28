<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\film;
use App\comment;
use DB;
use App\Http\Resources\film as filmResource;

class PagesController extends Controller
{
	public function index(){
		
		$comments=comment::all();

		$films=film::paginate(1);
		$films=filmResource::collection($films);
        return view('welcome', compact('films','comments'));
		
		}
	
}
