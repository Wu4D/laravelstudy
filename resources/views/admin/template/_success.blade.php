@if(Session::has('success'))

<div class="alert alert-success alert-dismissable">
	<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<i class="icon fa fa-check"></i>
		{{Session::get('success')}}
	
</div>

@endif