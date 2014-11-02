@extends('admin.template')

@section('content')

	<h3 class="pull-left">Usuń wpis z menu</h3>

	<div class=""> 

		{!! Form::open([ 'url' => 'admin/menu/' . $menu->id . '/delete']) !!}

			{!! Form::submit('Potwierdź usunięcie', [ 'class' => 'btn btn-lg btn-danger pull-right']) !!}

			<div class="clearfix"></div>

			<p>Potwierdź usunięcie wpisu z menu <b>{{ $menu->display_name }}</b> klikając przycisk powyżej.</p>

		{!! Form::close() !!}

	</div>

@stop