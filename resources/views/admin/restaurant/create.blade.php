@extends("admin.template.template")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		</br>
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">
					@if($_form->method == "put")
						Edit {{$_form->model->name}}
					@else
						Create a new resturant
					@endif
				</h3>
			</div>
			<div class="box-body">

				@include('admin.template._errors')
				
				@include('admin.template._success')

				@include("admin.restaurant._form")

			</div>

		</div>

	</div>
</div>
</div>
</div>

@stop

