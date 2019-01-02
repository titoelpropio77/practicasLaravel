@extends('layouts.layout');
@section('content')
<h1>{{ $user->name }}</h1>
<table class="table">
	<tr>
		<th>Nombre:</td>
			<td>{{$user->name}}</td>
	</tr>
	<tr>
		<th>Email:</td>
			<td>{{$user->email}}</td>
	</tr>
	<tr>
		<th>Roles:</th>
		<td>@foreach($user->roles as $role)
						{{ $role->display_name }}</td>
					@endforeach
		</td>
	</tr>
</table>
 @can('edit', $user)   
	<a href="{{ route('usuarios.edit',$user->id) }}"  class="btn btn-info">editar</a>
@endcan
 @can('destroy', $user)   
<form style="display:inline"
						   method="POST"
						   action="{{ route('usuarios.destroy', $user->id) }}">
						   	{!! csrf_field() !!}
						   	{!! method_field('DELETE') !!}
					<button class="btn btn-danger " type="submit" >Eliminar</button>
@endcan
@stop 