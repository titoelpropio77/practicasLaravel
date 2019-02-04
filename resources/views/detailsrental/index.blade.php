@extends('layouts.layout')
@section('content')
<h1>{{$title}} </h1>
<div class="row">
{{-- <button class="btn btn-success float-right" onclick="openModal('save')">Crear Nuevo Cliente</button> --}}
<script type="text/javascript">var title ='{{$title}}'</script>
</div>
<form id="form-data" enctype="multipart/form-data">
	<div class="row">
		{{-- <div class="col-lg-12"> --}}
				<div class="col-sm-4" >
					<div class="form-group">
						<label>Seleccion al Cliente</label>
						<select id="clients_id" class="form-control" required="">
							<option value="">Seleccione al Cliente</option>
							@foreach($client as $cli)
								<option value="{{$cli->id}}" >{{ $cli->name . ' '.$cli->lastname }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="form-group">
						<label>Seleccione el cuarto</label>
						<select id="room_id" name="room_id" class="form-control"  required="">
							<option>Seleccione el Cuarto</option>
							@foreach($room as $room)
								<option value="{{$room->id}}" >{{ $room->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-4 col-md-4"  style="display: inline-block">
					<div class="form-group">
						<label>Tipo de Moneda</label>
						<select name="type_money" class="form-control">
							<option value="boliviano" >Bs</option>
							<option value="dolar" >Usd</option>
						</select>
					</div>
				</div>
		{{-- </div> --}}
	</div>
	<div class="row">
		<div class="col-lg-4">
			<label>Fecha del Alquiler</label>
			<input type="date" name="daterental" class="form-control"  required="">
		</div>
		<div class="col-lg-4">
			<div class="row">
				<div class="col-lg-6">
					<label>No Incluye Luz? <input type="checkbox" value="SI" name="includes_light"></label>
				</div>
				<div class="col-lg-6">
					<label>Partida de Watts</label>
					<input type="number" name="light_match" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="row">
				<div class="col-lg-6">
					<label>No Incluye Agua? <input type="checkbox" value="SI" name="includes_water"></label>
				</div>
				<div class="col-lg-6">
					<label>Partida de Agua</label>
					<input type="number" name="water_match" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<label>Precio alquiler</label>
			<input type="number" name="pay_rental" class="form-control" required="">
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Tipo de Alquiler</label>
				<select class="form-control" name="tipo_rental">
					<option value="months">Mensual</option>
					<option value="day">Diario</option>
					<option value="weekly">Semanal</option>
					<option value="quarterly">Quincenal</option>
					<option value="annual">Anual</option>
					<option value="Otros">Otros</option>
				</select>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="row">
				<div class="col-lg-6">
					<label>Pago del Interes(Opcional)</label>
					<input type="number" name="interest_payment" class="form-control"  >
				</div>
				<div class="col-lg-6">
					<label>Estado</label>
					<select class="form-control" name="status_interest">
						<option>No Paga</option>
						<option>Pendiente</option>
						<option>Faltante</option>
						<option>Pagado</option>
					</select>
				</div>
				<div class="col-lg-6">
					<label>Fecha del pago del interes</label>
					<input type="date" name="date_interest_payment" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<label>Vencimiento del Contrato</label>
			<input type="date" name="date_finish" class="form-control"  required="">
		</div>
	</div>
</form>
<div class="row float-right">
	<button class="btn btn-success" onclick="save()">Guardar</button>
	<button class="btn btn-danger">Cancelar</button>
</div>
@endsection
@section('scripts')
 <script type="text/javascript" src="{{ asset('js/detailRental.index.js') }}"></script>
@endsection
