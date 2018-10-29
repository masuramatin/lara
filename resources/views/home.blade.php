@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            
            </div>
        </div>
    </div>
   @if (Auth::user()->email=='admin@gmail.com') 
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Film Information</div>
                @if(Session::has('flash_message1'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message1') }}
                    </div>
                @endif
                    <div align="center"><a href="{{action('FilmController@create')}}"><b>Add New Film</b></a></div>
                    <hr />
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            
                        </div>
                    @endif

                    <div class="row">
                      <div class="col-sm-3 col-md-3"><b>Name</b></div>
                      <div class="col-sm-3 col-md-3"><b>Realease Date</b></div>
                      <div class="col-sm-3 col-md-3"><b>Country</b></div>
                      <div class="col-sm-3 col-md-3"><b>Action</b></div>
                    </div>
                    <hr />
                    @foreach($films as $film)
                    <div class="row">
                      <div class="col-sm-3 col-md-3">{{$film['name']}}</div>
                      <div class="col-sm-3 col-md-3">{{$film['release_date']}} Date</div>
                      <div class="col-sm-3 col-md-3">{{$film['country']}}</div>
                      <div class="col-sm-3 col-md-3"><a href="{{action('FilmController@edit', $film['id'])}}">Edit</a> | <a href="{{action('FilmController@destroy', $film['id'])}}">Delete</a> | <a href="{{action('FilmController@show', $film['id'])}}">View</a></div>
                    </div>
                    @endforeach

                    {{ $films->links()}} 
                </div>
            </div>
        </div>
    </div>   
    @endif 
</div>
@endsection
