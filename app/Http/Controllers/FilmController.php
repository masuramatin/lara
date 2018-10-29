<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\film;
use App\comment;

use Session;
use App\Http\Resources\film as filmResource;
use App\Http\Requests;
use DB;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Get Films
        $films = film::all();

        // Return collection of articles as a resource
        $films=filmResource::collection($films);

        return view('film.display', compact('films'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //go to create view in film folder
        
        return view('film.create');
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
        //
        $film = new \App\film;
        $image = $request->file('photo');
        //upload photo
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $input['imagename']); 

        $film->name = $request->get('name');
        $film->description = $request->get('description');
        $film->release_date = $request->get('release_date');
        $film->rating = $request->get('rating');
        $film->ticket_price = $request->get('ticket_price');
        $film->country = $request->get('country');
        $film->genre = $request->get('genre');

        $film->photo = $input['imagename'];
        $film->save();
        Session::flash('flash_message1', 'Information has been added!');
        //inserted data in json format
        //return new filmResource($film);
        return redirect('/')->with('success', 'Information has been added');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //search film information using id
        $film = film::find($id);

        // Return single article as a resource
        //return new filmResource($film);        
        //send searched information to view
        return view('film.show',compact('film','id'));           
    }
    function getFilm($id){
        //print $id;
        $comments = comment::all();
        $films=DB::table('films')->
        where('name', $id)->get();    
        
        return view('film.film_how',compact('films','comments'));         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $films = film::find($id);
        return view('film.edit',compact('films','id'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $film =  film::find($id);
        
        $image = $request->file('photo');
        //upload photo
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $input['imagename']); 

        $film->name = $request->get('name');
        $film->description = $request->get('description');
        $film->release_date = $request->get('release_date');
        $film->rating = $request->get('rating');
        $film->ticket_price = $request->get('ticket_price');
        $film->country = $request->get('country');
        $film->genre = $request->get('genre');

        $film->photo = $input['imagename'];
        $film->save();
        Session::flash('flash_message', 'Information has been updated!');
        //updated data in json format
        //return new filmResource($film);        
        return redirect('/home')->with('success', 'Information has been added');              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $film = film::find($id);
        $film->delete();
        Session::flash('flash_message', 'Information has been deleted!');
        //deleted record in json format
        //return new filmResource($film); 
        return redirect('/home');      
    
    }
}
