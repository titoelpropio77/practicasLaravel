@extends('layouts.layout')
@section('content')
@include('meters.modal')
<h1>Medidores </h1>
<div class="row">
<button class="btn btn-success float-right" onclick="openModal('save')">Crear Nuevo Medidor</button>
</div>
<div class="row">
<div class="col-lg-12">

<div class="col-lg-12">
	<table id="dataTable" class="table ">
		<thead>
			<th>Codigo Interno</th>
			<th>Nombre Propietario</th>
			<th>Compañia</th>
			<th>Tipo</th>
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
 <script type="text/javascript" src="{{ asset('js/meters.index.js') }}"></script>
@endsection
