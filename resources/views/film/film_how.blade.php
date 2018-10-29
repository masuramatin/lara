@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))

            @endif

            <div class="content container">
                @if(Session::has('flash_message1'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message1') }}
                    </div>
                @endif

                <div class="links">
                 @foreach($films as $film) 
                    <div  class="container">

                            <div id="">

                        <h3>Film Information Details</h3>
                        <hr />
                        <div>
                            Name : {{ $film->name }}
                        </div> 
                        <hr /> 
                        <div>
                            Description : {{ $film->description }}
                        </div> 
                        <hr /> 
                      <div>
                        Releasing Date : {{ $film->release_date }}
                        </div> 
                        <hr /> 
                      <div>
                        Rating : {{ $film->rating }}
                        </div> 
                        <hr /> 
                      <div>
                        Ticket Price : {{ $film->ticket_price }}
                        </div> 
                        <hr /> 
                      <div>
                        Country : {{ $film->country }}
                        </div> 
                        <hr /> 
                          <div>
                        Genre : {{ $film->genre }}
                        </div> 
                        <hr /> 

                        <div>
                            <img src="{{ url('/') }}/img/{{$film->photo}}" alt="Lights" height="300px" width="500px">
                        </div> 
                        <hr /> 
                                  
                    </div>
                    
                    </div>

                    <hr />
                    <h3>Comments</h3>
                    <hr />
                    <div class="container">
                        @foreach($comments as $comment)

                            @if($film->id==$comment['filmid'])
                            <hr />
                            <div>Name:{{ $comment['name'] }}</div>
                            <div>Comment:{{ $comment['comment'] }}</div>
                            <hr />
                            @endif
                            
                        @endforeach    
                    </div> 

                    <hr />
                    @if (Auth::guest())

                    @else

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        <form method="post" action="{{url('comment_store')}}" enctype="multipart/form-data">
                          {{ csrf_field() }}     

                        <input type="hidden" id="filmid" name="filmid" value="{{$film->id}}">
                        <div class="container">  
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

                            <div class="row form-group">
                                <div class="col-md-2 col-sm-2">
                                    <label for='name'>
                                    Comment:
                                    </label>
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <textarea id="comment" name="comment" class="form-control" required /></textarea>

                                </div>
                            </div>                            
                            <br /> 

                            <div class="row">

                                <div class="col-md-12 col-sm-12">
                                    <input type="submit" id="submit" name="submit" value="Submit" class="form-control btn btn-info"/>
                                </div>
                            </div> 
                        </div>                       
                    @endif  

                 @endforeach


                 
                </div>
            </div>
        </div>
    </body>
</html>
@endsection