@extends('admin.template')

@section('content')

	<div class=""> 

		{!! Form::open([ 'url' => 'admin/menu/' . $menu->id . '/delete']) !!}

			{!! Form::submit('Delete menu item', [ 'class' => 'btn btn-lg btn-danger pull-right']) !!}

			<div class="clearfix"></div>

			<p>Confirm deleting menu item <b>{{ $menu->display_name }}</b> by clicking the button above.</p>

		{!! Form::close() !!}

	</div>

@stop