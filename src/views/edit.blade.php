@extends('admin.template')

@section('content')

	<h3 class="pull-left">Edit menu item</h3>

	<div class=""> 

		{!! Form::open([ 'url' => 'admin/menu/' . $menu->id . '/edit']) !!}

			{!! Form::submit('Edit menu item', [ 'class' => 'btn btn-lg btn-primary pull-right']) !!}

			<div class="clearfix"></div>

			<h3>{!! Form::label('display_name', 'Display name') !!}</h3>
			{!! Form::text('display_name', $menu->display_name, [ 'class' => 'form-control' ]) !!}

			<h3>{!! Form::label('route', 'Route') !!}</h3>
			{!! Form::text('route', $menu->route, [ 'class' => 'form-control' ]) !!}

			<h3>{!! Form::label('params', 'Parameters') !!}</h3>
			{!! Form::textarea('params', $menu->params, [ 'class' => 'form-control', 'rows' => 2 ]) !!}

		{!! Form::close() !!}

	</div>

@stop