@if(count($errors) > 0)

<div class="alert alert-danger alert-dismissable">
	<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
	<h4>
		<i class="icon fa fa-ban"></i>
		Error
	</h4>
	@foreach($errors->all() as $error)
		-{{$error}} </br>
	@endforeach

</div>

@endif