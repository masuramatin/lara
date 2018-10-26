@extends('layouts.app')

@section('content')

<div class="container">
<h3>Add New Film</h3>
<hr />
<form method="post" action="{{url('store')}}" enctype="multipart/form-data">
  {{ csrf_field() }}     

<div class="row form-group">
	<div class="col-md-2 col-sm-2">
        <label for='name'>
        Name:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
        <input type="text" id="name" name="name" class="form-control" required />

    </div>
</div>   
<br /> 
  
<br />  
<div class="row" >
	<div class="col-md-2 col-sm-2">
        <label for='description'>
        Description:
        </label>
    </div>
	<div class="col-md-10 col-sm-10">
    	<textarea id="description" name="description" class="form-control" required /></textarea>
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
    	<input type="date" id="release_date" name="release_date" class="form-control" required/>
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
        <input id="rating-1" name="rating" type="radio" value="1"  class="form-control" checked="checked" />1
        <input id="rating-2" name="rating" type="radio" value="2"  class="form-control" />2
        <input id="rating-3" name="rating" type="radio" value="3"  class="form-control" />3
        <input id="rating-4" name="rating" type="radio" value="4"  class="form-control" />4
        <input id="rating-5" name="rating" type="radio" value="5"  class="form-control" />5
        
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
        <input type="text" id="ticket_price" name="ticket_price" class="form-control" required />
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
        <input type="text" id="country" name="country" class="form-control" required />
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
        <textarea id="genre" name="genre" class="form-control" required ></textarea>
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