@extends('admin.template')

@section('content')

	<div class=""> 

		<div class="clearfix"></div>
		@if(count($menu))

		<table class="table table-striped">
			<thead>
				<th>lp</th>
				<th>Display name</th>
				<th>Route</th>
				<th>Params</th>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				@foreach($menu as $m)
				<tr>
					<td>{{ $m->lp }}</td>
					<td>{{ $m->display_name }}</td>
					<td>{{ $m->route }}</td>
					<td>{{ $m->params }}</td>
					<td></td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p class="text-muted">No menu found.</p>
		@endif

	</div>

@stop