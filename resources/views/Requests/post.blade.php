@extends('welcome')

	@section('navItems')
       <ul class="nav navbar-nav">
                    <li class=""><a href="{{ action('RequestController@get') }}">Get</a></li>
                    <li class="active"><a href="{{ action('RequestController@post') }}">Post</a></li>
                    <li class=""><a href="{{ action('RequestController@put') }}">Put</a></li>
                    <li class=""><a href="{{ action('RequestController@delete') }}">Delete</a></li>
                </ul>
    @stop

	@section('content')
	<div class="container">
	<div class="row">
			   	{!! Form::open(['url' => 'post']) !!}

				@include('Requests.PostForm', ['submitButtonText' => 'Start Analysis'])

				{!! Form::close() !!}
		    @if (isset($TotalRequests))
		    <h3>Number of requests: 10</h3>
		    <h3>Average time: {{ $media}}</h3>
		    <h3>Total request time: {{ $eventTime}}</h3>
		    @endif
		    <canvas id="myChart" class="col-md-12"></canvas>

		   </div>
		</div>

	@stop
	@section('scripts')
	 @if (isset($TotalRequests))
	 <script type="text/javascript">
	 	var ctx = document.getElementById("myChart").getContext("2d");
	 	var options  = {

    ///Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - Whether the line is curved between points
    bezierCurve : true,

    //Number - Tension of the bezier curve between points
    bezierCurveTension : 0.4,

    //Boolean - Whether to show a dot for each point
    pointDot : true,

    //Number - Radius of each point dot in pixels
    pointDotRadius : 4,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth : 1,

    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 2,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill : true,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

};


		 <?php $i=0 ?>
	 	var data = {
    labels: ["1", "2", "3", "4", "5", "6", "7","8","9","10"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [@foreach($TotalRequests as $request)@if($i < 9){{ $request}},@else{{ $request}}@endif<?php $i++ ?>@endforeach]
        }
    ]
};
		var myLineChart = new Chart(ctx).Line(data, options);
	 </script>
	 @endif
	@stop
	