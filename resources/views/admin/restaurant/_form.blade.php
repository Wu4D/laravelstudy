 <div class="box-body">
	{!! Form::open(array('url' => action($_form->action, $_form->parameters), 'method' => $_form->method)) !!}
	{!! Form::model($_form->model) !!}



	<div class="form-group" >
		{!! Form::text('name', null,['class' => 'form-control' , 'placeholder' => 'Name ']) !!}
	</div>

	<div class="form-group" >
		{!! Form::text('email', null,['class' => 'form-control' , 'placeholder' => 'Email Adress']) !!}
	</div>

	<div class="form-group">

		{!! Form::text('langitude', null,['class' => 'form-control', 'placeholder' => 'Langitude']) !!}
	</div>

	<div class="form-group" >

		{!! Form::text('longitude', null,['class' => 'form-control', 'placeholder' => 'Longitude']) !!}
	</div>

</div>

<div class="box-footer">
	{!! Form::submit('Adaugare',  ['class' => 'btn btn-primary']) !!}

</div>

{!! Form::close() !!}
