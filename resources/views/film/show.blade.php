@extends('layouts.app')

@section('content')

<div  class="container">
<!-- print button start -->

<!-- print button end -->
<!-- print header start -->
        <div id="divToPrint">

	<h3>Film Information Details</h3>
    <hr />
	<div>
		Name : {{ $film['name'] }}
    </div> 
    <hr /> 
	<div>
		Description : {{ $film['description'] }}
    </div> 
    <hr /> 
  <div>
    Releasing Date : {{ $film['release_date'] }}
    </div> 
    <hr /> 
  <div>
    Rating : {{ $film['rating'] }}
    </div> 
    <hr /> 
  <div>
    Ticket Price : {{ $film['ticket_price'] }}
    </div> 
    <hr /> 
  <div>
    Country : {{ $film['country'] }}
    </div> 
    <hr /> 
      <div>
    Genre : {{ $film['genre'] }}
    </div> 
    <hr /> 

	<div>
		Photo : <img src="{{ url('/') }}/img/{{$film['photo']}}" alt="Lights" height="100px" width="150px">
    </div> 
    <hr /> 
              
</div>
</div>
@endsection