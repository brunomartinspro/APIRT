@extends('welcome')
    
    @section('navItems')
       <ul class="nav navbar-nav">
                    <li class=""><a href="{{ action('RequestController@get') }}">Get</a></li>
                    <li class=""><a href="{{ action('RequestController@post') }}">Post</a></li>
                    <li class=""><a href="{{ action('RequestController@put') }}">Put</a></li>
                    <li class=""><a href="{{ action('RequestController@delete') }}">Delete</a></li>
                </ul>
    @stop
	
	@section('content')
		 <div class="jumbotron text-center" style="background-color: #FFFFFF;">
        <h1>Welcome to APIRT</h1>
        <p>Your API Response Tester</p>
    </div>
	@stop
	