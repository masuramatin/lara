@extends('layouts.app')

@section('content')
<div class="container">
<h3>Edit Film Information</h3>
<hr />
<form method="post"  
action="{{ route('film.update', $id) }}" enctype="multipart/form-data" >
<input type="hidden" name="_token" 
value="{{ csrf_token() }}"> 
   
<br /> 
<div class="row form-group">
    <div class="col-md-2 col-sm-2">
        <label for='name'>
        Name:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="name" name="name" class="form-control" value="{{ $films['name'] }}" required  />

    </div>
</div>   
<br /> 
 
<div class="row" >
    <div class="col-md-2 col-sm-2">
        <label for='description'>
        Description:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <textarea id="description" name="description" class="form-control" required />{{ $films['description'] }} </textarea>
    </div>
</div>
<br />  

<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='release_date'>
        Releasing Date:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="date" id="release_date" name="release_date" class="form-control" value="{{ $films['release_date'] }}" required/>
    </div>
</div>
<br />  
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='rating'>
        Rating:
        </label>
    </div>
    <div class="col-md-10 col-sm-4" align="left">

        @if($films['rating']==1)
        <input id="rating-1" name="rating" type="radio" value="1"  class="form-control" checked="checked" />1
        @else
        <input id="rating-1" name="rating" type="radio" value="1"  class="form-control"  />1
        @endif
        @if($films['rating']==2)
        <input id="rating-2" name="rating" type="radio" value="2"  class="form-control" checked="checked" />2
        @else
        <input id="rating-2" name="rating" type="radio" value="2"  class="form-control"  />2
        @endif 

        @if($films['rating']==3)
        <input id="rating-3" name="rating" type="radio" value="3"  class="form-control" checked="checked" />3
        @else
        <input id="rating-3" name="rating" type="radio" value="3"  class="form-control"  />3
        @endif

        @if($films['rating']==4)
        <input id="rating-4" name="rating" type="radio" value="4"  class="form-control" checked="checked" />4
        @else
        <input id="rating-4" name="rating" type="radio" value="4"  class="form-control"  />4
        @endif
        @if($films['rating']==5)
        <input id="rating-5" name="rating" type="radio" value="5"  class="form-control" checked="checked" />5
        @else
        <input id="rating-5" name="rating" type="radio" value="5"  class="form-control"  />5
        @endif
       
       
        
    </div>
</div>
<br />  
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='ticket_price'>
        Ticket Price:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="ticket_price" name="ticket_price" class="form-control" value="{{ $films['ticket_price'] }}" required />
    </div>
</div>
<br />  
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='country'>
        Country:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="text" id="country" name="country" class="form-control" value="{{ $films['country'] }}" required />
    </div>
</div>
<br />  
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='genre'>
        Genre:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <textarea id="genre" name="genre" class="form-control" required >{{ $films['genre'] }}</textarea>
    </div>
</div>
<br />  
<div class="row">
    <div class="col-md-2 col-sm-2">
        <label for='photo'>
        Photo:
        </label>
    </div>
    <div class="col-md-10 col-sm-10">
        <input type="file" id="photo" name="photo" class="form-control" required />
    </div>
</div>
<br />   
 
<div class="row">

	<div class="col-md-12 col-sm-12">
    	<input type="submit" id="submit" name="submit" value="Submit" class="form-control btn btn-info"/>
    </div>
</div>  
</form>
</div>
@endsection