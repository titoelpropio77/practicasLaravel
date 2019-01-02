@extends('layouts.layout')
@section('content')
	<h1>Guardar Usuarios</h1>
	@if(session()->has('info'))
	<div class="alert alert-success" >{{ session('info')}}</div>
	
	@endif
	<form  method="POST" action='{{ route('usuarios.store') }}'>
		@include('users.form',['user'=>new App\User])
	</form>
@stop