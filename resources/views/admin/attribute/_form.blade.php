	@foreach($errors->all() as $msg)
	<div class="alert alert-danger">{{$msg}}</div>

	@endforeach
	<div class="panel-body">

		{!! Form::open(array('url' => action($_form->action, $_form->parameters), 'method' => $_form->method)) !!}
		{!! Form::model($_form->model) !!}

		{!! Form::text("slug", null, ["placeholder" => "Attribute Name"]) !!}

		<div class="form-group" >
			{!! Form::submit('Add',  ['class' => 'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
		
	</div>