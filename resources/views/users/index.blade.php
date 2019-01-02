@extends('layouts.layout')
@section('content')
<h1>User</h1>
<a class="btn btn-success float-right" href="{{ route('usuarios.create') }}">Crear Nuevo Usuario</a>
<table class="table">
	<thead>
		<th>id</th>
		<th>name</th>
		<th>email</th>
		<th>Role</th>
		<th>Acciones</th>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					{{ $user->roles->pluck('display_name')->implode(',') }}
					
				<td>

					<a class="btn btn-primary btn-sm" href="{{ route('usuarios.edit',$user->id) }}" >Modificar</a>
					<form style="display:inline"
						   method="POST"
						   action="{{ route('usuarios.destroy', $user->id) }}">
						   	{!! csrf_field() !!}
						   	{!! method_field('DELETE') !!}
					<button class="btn btn-danger btn-sm" type="submit" >Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop
