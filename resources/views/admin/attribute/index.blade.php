@extends("admin.template.template")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Latest Attributest </h3>
					<div class="box-tools pull-right">
						<a href="{{ action('Admin\AttributeController@create') }}"><i class="fa fa-plus-circle fa-lg"></i></a>
					</div>
				</div>

				<div class="box-body">
				
					<div class="table-responive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Attribute Id</th>
									<th>Name</th>
									<th style="width:30px"><i class="fa fa-pencil-square-o fa-lg"></i></th>
								</tr>
							</thead>
							
							@foreach ($results as $result)
							<tr>
								<td>{{$result->id }}</td>
								<td>{{$result->slug }}</td>
								<td><a href="#" ><i class="fa fa-pencil-square-o"></i></a></td>
							</tr>
							@endforeach
							
						
						</table>
					</div>
				</div>

				<div class="box-footer">
					<ul class="pagination pagination-sm no-margin pull-right">
						{!! $paginate_links !!}
					</ul>
				</div>
			</div>




		</div>
	</div>
</div>
</div>

@stop

