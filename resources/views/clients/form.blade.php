<form id="form-data" enctype="multipart/form-data">
	<div class="">
		<input type="hidden" name="id_edit">
		{!! csrf_field() !!}
		<label for="name">Nombre:
			<input type="text" name="name" class="form-control" required>
		</label>
		<label for="lastname">Apellidos:
			<input type="text" name="lastname" class="form-control" required>
		</label>
		<label for="email">Email:
			<input type="text" name="email" class="form-control" >
		</label>
		<label for="celphone">Celular:
			<input type="number" name="celphone" class="form-control" required>
		</label>
		<label for="address">Direccion:
			<input type="text" name="address" class="form-control" required>
		</label>
		<label for="cedula_identidad">CI:
			<input type="text" name="cedula_identidad" class="form-control" required>
		</label>
		<label for="extension">Extensión:
			<select name="extension_cedula" class="form-control" required>
				<option value="SCZ">SCZ</option>
				<option value="CBB">CBB</option>
				<option value="BN">BN</option>
				<option value="LPZ">LPZ</option>
				<option value="ORU">ORU</option>
				<option value="OR">OR</option>
			</select>
		</label>
	</div>
</form>