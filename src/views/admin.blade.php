@extends('admin.template')

@section('content')

	<h3 class="pull-left">Menus</h3>

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
				<th>up</th>
				<th>down</th>
			</thead>
			<tbody>
				@foreach($menu as $k => $m)
				<tr>
					<td>{{ $m->id }}</td>
					<td>{{ $m->display_name }}</td>
					<td>{{ $m->route }}</td>
					<td>{{ $m->params }}</td>
					<td>
						<a href="{{ url('admin/menu/' . $m->id . '/edit') }}" class="btn btn-sm btn-primary">edit</a>
					</td>
					<td>
						<a href="{{ url('admin/menu/' . $m->id . '/delete') }}" class="btn btn-sm btn-danger">delete</a>
					</td>
					<td>
						@if($k-1 > 0)
						{!! Form::open(['url' => 'admin/menu/swap']) !!}

							{!! Form::hidden('id1', $menu[$k-1]->id) !!}
							{!! Form::hidden('id2', $m->id) !!}

							{!! Form::submit('move up', [ 'class' => 'btn-sm btn btn-success']) !!}

						{!! Form::close() !!}
						@endif
					</td>
					<td>
						@if($k+1 < count($menu))
						{!! Form::open(['url' => 'admin/menu/swap']) !!}

							{!! Form::hidden('id1', $m->id) !!}
							{!! Form::hidden('id2', $menu[$k+1]->id) !!}

							{!! Form::submit('move down', [ 'class' => 'btn-sm btn btn-success']) !!}

						{!! Form::close() !!}
						@endif

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p class="text-muted">No menu found.</p>
		@endif

	</div>

@stop