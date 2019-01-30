@extends('layouts.layout')
@section('content')
@include('rooms.modal')
<h1>Propiedad </h1>
<div class="row">
<button class="btn btn-success float-right" onclick="openModal('save')">Crear Nueva Propiedad</button>
</div>
<div class="row">
<div class="col-lg-12">

<div class="col-lg-12">
	<table id="dataTable" class="table ">
		<thead>
			<th>Codigo Interno</th>
			<th>Nombre</th>
			<th>Description</th>
			<th>Precio</th>
			<th>Direccion</th>
			<th>Numero de Cuarto</th>
			<th>Type de Cuarto</th>
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
 <script type="text/javascript" src="{{ asset('js/room.index.js') }}"></script>
@endsection
