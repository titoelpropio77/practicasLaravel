@extends('layouts.layout')
@section('content')
<h1>Clientes </h1>
<button class="btn btn-success float-right" onclick="openModal('save')">Crear Nuevo Cliente</button>

@include('clients.modal')
<table class="table">
	<thead>
		<th>Codigo Interno</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Dirección</th>
		<th>email</th>
		<th>Acciones</th>
	</thead>
	<tbody>
		@foreach($clientlist as $client)
			<tr>
				<td>{{ $client->id }}</td>
				<td>{{ $client->name }}</td>
				<td>{{ $client->lastname }}</td>
				<td>{{ $client->address }}</td>
				<td>{{ $client->email }}</td>
				<td>
					<button class="btn btn-primary btn-sm"  onclick="getDataClienteById({{ $client->id }});openModal('modify')" >Modificar</button>
					<button class="btn btn-danger btn-sm" data-id= "{{ $client->id }}" onclick="delete(this)" >Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection
@section('scripts')
 <script type="text/javascript" src="{{ asset('js/clients.index.js') }}"></script>
@endsection
