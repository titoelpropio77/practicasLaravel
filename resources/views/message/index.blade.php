@extends('layouts.layout')
@section('content')
<h1>Todos los Mensajes</h1>
<table class="table">
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Email</th>
		<th>Mensaje</th>
		<th>Notas</th>
		<th>Acciones</th>
	</thead>
	<tbody>
		@foreach( $mensajes as $mensaje )
		<tr>
			<td>{{ $mensaje->id }}</td>
			@if($mensaje->user_id)
				<td><a href="{{ route('usuarios.show',$mensaje->user->id) }}">{{ $mensaje->user->name }}</a></td>
				<td>{{ $mensaje->user->email  }}</td>
			@else
			<td>{{ $mensaje->nombre }}</td>
			<td>{{ $mensaje->email }}</td>
			@endif
			<td>
				<a href="{{ route('mensaje.show',$mensaje->id) }}">{{ $mensaje->mensaje }}</a>
			</td>
			<td>
				{{ $mensaje->note->body ?? '' }}
			</td>
			<td>
				<a href="<?php  echo route('mensaje.edit',$mensaje->id)  ?>" class="btn btn-primary btn-xs"	>Editar</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection