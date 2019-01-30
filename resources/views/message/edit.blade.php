@extends('layouts.layout')
@section('content')
	<h1>Editar Mensaje</h1>
	@if(session()->has('info'))
	<div class="alert alert-success" >{{ session('info')}}</div>

	@endif
	<form  method="POST" action='{{ route('mensaje.update',$mensaje->id) }}'>
		{!! method_field('PUT') !!}
		@include('message.form',[
			'btnText'=>'Actualizar',
			'showFields' => ! $mensaje->user_id
			])
	</form>
@stop