@extends('welcome')

@section('navItems')
       <ul class="nav navbar-nav">
                    <li class=""><a href="{{ action('RequestController@get') }}">Get</a></li>
                    <li class=""><a href="{{ action('RequestController@post') }}">Post</a></li>
                    <li class="active"><a href="{{ action('RequestController@put') }}">Put</a></li>
                    <li class=""><a href="{{ action('RequestController@delete') }}">Delete</a></li>
                </ul>
    @stop

	@section('content')
	<div class="container">
	<div class="row">
			   	{!! Form::open(['url' => 'put']) !!}

				@include('Requests.PostForm', ['submitButtonText' => 'Start Analysis'])

				{!! Form::close() !!}
		    @if (isset($TotalRequests))
		   
		   	<h3>Number of requests: 10</h3>
		    <h3>Average time: {{ $media}}</h3>
		    <h3>Total request time: {{ $eventTime}}</h3>

		          <table class="table table-bordered">
			      <thead>
			        <tr>
			          <th>Url</th>
			          <th>Time</th>
			        </tr>
			      </thead>
			      <tbody>
			             @foreach($TotalRequests as $request)
						<tr>
			                     <td>{{ $url}}</td>
			                        <td>{{ $request}}</td>
			                         </tr>
			            @endforeach
			      </tbody>
			    </table>

            @endif
		   </div>
		</div>

	@stop
	