@extends('layouts.layout')
@section('content')
@include('typeroom.modal')
<h1>Tipo de cuarto </h1>
<div class="row">
<button class="btn btn-success float-right" onclick="openModal('save')">Crear Nuevo Tipo de Cuarto</button>
</div>
<div class="row">
<div class="col-lg-12">

<div class="col-lg-12">
	<table id="dataTable" class="table ">
		<thead>
			<th>Codigo Interno</th>
			<th>Nombre</th>
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
 <script type="text/javascript" src="{{ asset('js/typeroom.index.js') }}"></script>
@endsection
