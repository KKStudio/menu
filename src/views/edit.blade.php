@extends('admin.template')

@section('content')

	<h3 class="pull-left">Edycja wpisu z menu</h3>

	<div class=""> 

		{!! Form::open([ 'url' => 'admin/menu/' . $menu->id . '/edit']) !!}

			{!! Form::submit('Zapisz zmiany', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

			<div class="clearfix"></div>

			<h3>{!! Form::label('display_name', 'Nazwa wyświetlana') !!}</h3>
			{!! Form::text('display_name', $menu->display_name, [ 'class' => 'form-control' ]) !!}

			<h3>{!! Form::label('route', 'Ścieżka') !!}</h3>
			{!! Form::text('route', $menu->route, [ 'class' => 'form-control' ]) !!}

			<h3>{!! Form::label('params', 'Parametry') !!} <small>format jSON</small></h3>
			{!! Form::textarea('params', $menu->params, [ 'class' => 'form-control', 'rows' => 2 ]) !!}

		{!! Form::close() !!}

	</div>

@stop