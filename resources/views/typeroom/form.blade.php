<form id="form-data" enctype="multipart/form-data">
	<div class="">
		<input type="hidden" name="typeroom_id">
		{!! csrf_field() !!}
		<label for="name">Nombre:
			<input type="text" name="name" class="form-control" required>
		</label>
	</div>
</form>