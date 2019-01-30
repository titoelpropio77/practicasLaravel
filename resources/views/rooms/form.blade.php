<form id="form-data" enctype="multipart/form-data">
	<div class="">
		<input type="hidden" name="room_id">
		{!! csrf_field() !!}
		<div class="col-lg-12">
			<div class="col-lg-6">
				<label for="internal_code">Codigo Interno:
					<input type="text" name="internal_code" class="form-control" required>
				</label>
			</div>
			<div class="col-lg-12">
				<label for="name">Nombre:</label>
				<input type="text" name="name" class="form-control" required>
			</div>
		<div class="col-lg-6">
			<label for="description">Descripcion:</label>
			<input type="text" name="description" class="form-control" >
		</div>
		<div class="col-lg-6">
			<label for="price">Precio:</label>
			<input type="number" name="price" class="form-control" >
		</div>
		<div class="col-lg-6">
			<label for="address">Direccion:</label>
			<input type="text" name="address" class="form-control" >
		</div>
		<div class="col-lg-6">
			<label for="number_room">Numero de Cuarto:</label>
			<input type="text" name="number_room" class="form-control" >
		</div>
		<div class="col-lg-6">
			<label for="type">Tipo de Propiedad:</label>
			<select class="form-control" name="typerooms_id">
				<option>Seleccione un tipo de cuarto</option>
				@foreach( $typeRoom  as $type)
					<option value="{{ $type->id }}">{{ $type->name }}</option>
				@endforeach
			</select>
		</div>
		</div>
	</div>
</form>