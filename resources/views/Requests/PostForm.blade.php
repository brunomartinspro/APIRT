	<div class="form-group">
		{!! Form::label('url', 'Insert your API url:') !!}
		{!! Form::text('url', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('numberOfRequests', 'Number of requests:') !!}
		{!! Form::text('numberOfRequests', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::label('type', 'Content Type:') !!}
	{!!Form::select('type', array('json' => 'JSON', 'xml' => 'XML'), 'JSON')!!}

	</div>


	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
	</div>

	
	<div class="form-group">
		{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
	</div>	
	