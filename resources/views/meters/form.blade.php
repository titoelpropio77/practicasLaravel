<form id="form-data" enctype="multipart/form-data">
	<div class="">
		<input type="hidden" name="meter_id">
		{!! csrf_field() !!}
		<div class="col-lg-12">
			<div class="col-lg-6">
				<label for="internalcode">Codigo Interno:
					<input type="text" name="internalcode" class="form-control" required>
				</label>
			</div>
			<div class="col-lg-12">
				<label for="name_owner">Nombre del Propietario:</label>
				<input type="text" name="name_owner" class="form-control" required>
			</div>
		<div class="col-lg-6">
			<label for="name_company">Nombre de la Compañia:</label>
			<input type="text" name="name_company" class="form-control" >
		</div>
		<div class="col-lg-6">
			<label for="type">Tipo:</label>
			<select class="form-control" name="type">
				<option > Seleccion un Tipo</option>
				<option value="LUZ">LUZ</option>
				<option value="AGUA">AGUA</option>
				<option value="OTROS">OTROS</option>
			</select>
		</div>
		</div>
	</div>
</form>