<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\film;
use Session;
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
        //send searched information to view
        return view('film.show',compact('film','id'));           
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
        return redirect('/home');      
    
    }
}
