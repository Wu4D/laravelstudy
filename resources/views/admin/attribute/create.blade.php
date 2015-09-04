@extends("admin.template.template")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Create Attribute</h3>
				</div>
				
				<div class="box-body">
				
					@include('admin.template._success')

					@include("admin.attribute._form")
				</div>
			</div>

		</div>
	</div>
</div>
</div>

@stop

