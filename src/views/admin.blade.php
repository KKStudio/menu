@extends('admin.template')

@section('content')

	<h3 class="pull-left">Menu</h3>

	<div class=""> 

		<div class="clearfix"></div>
		@if(count($menu))

		<table class="table table-striped">
			<thead>
				<th>#</th>
				<th>Nazwa wyświetlana</th>
				<th>Ścieżka</th>
				<th>Parametry</th>
				<th></th>
				<th></th>
				<th>wyżej</th>
				<th>niżej</th>
			</thead>
			<tbody>
				@foreach($menu as $k => $m)
				<tr>
					<td>{{ $m->id }}</td>
					<td>{{ $m->display_name }}</td>
					<td>{{ $m->route }}</td>
					<td>{{ $m->params }}</td>
					<td>
						<a href="{{ url('admin/menu/' . $m->id . '/edit') }}" class="btn btn-sm btn-primary">edytuj</a>
					</td>
					<td>
						<a href="{{ url('admin/menu/' . $m->id . '/delete') }}" class="btn btn-sm btn-danger">usuń</a>
					</td>
					<td>
						@if($k-1 >= 0)
						{!! Form::open(['url' => 'admin/menu/swap']) !!}

							{!! Form::hidden('id1', $menu[$k-1]->id) !!}
							{!! Form::hidden('id2', $m->id) !!}

							{!! Form::submit('w górę', [ 'class' => 'btn-sm btn btn-success']) !!}

						{!! Form::close() !!}
						@endif
					</td>
					<td>
						@if($k+1 < count($menu))
						{!! Form::open(['url' => 'admin/menu/swap']) !!}

							{!! Form::hidden('id1', $m->id) !!}
							{!! Form::hidden('id2', $menu[$k+1]->id) !!}

							{!! Form::submit('w dół', [ 'class' => 'btn-sm btn btn-success']) !!}

						{!! Form::close() !!}
						@endif

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p class="text-muted">Brak wpisów w menu.</p>
		@endif

	</div>

@stop