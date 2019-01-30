@extends('layouts.layout')
@section('content')
@include('clients.modal')
<h1>Clientes </h1>
<div class="row">
<button class="btn btn-success float-right" onclick="openModal('save')">Crear Nuevo Cliente</button>
</div>
<div class="row">
<div class="col-lg-12">

<div class="col-lg-12">
	<table id="dataTable" class="table ">
		<thead>
			<th>Codigo Interno</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Dirección</th>
			<th>email</th>
			<th>Acciones</th>
		</thead>
		<tbody id="tbody">

		</tbody>
	</table>
</div>
</div>
</div>
@endsection
@section('scripts')
 <script type="text/javascript" src="{{ asset('js/clients.index.js') }}"></script>
@endsection
