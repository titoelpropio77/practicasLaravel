
<div class="row">
	<div class="col-sm-4">
	{!! csrf_field() !!}

	@unless ( $mensaje->user_id)
	<label>Nombre</label>
	<input class="form-control" type="text" name="nombre" value="{{ $mensaje->nombre ?? old('nombre') }}">
	{!! $errors->first('nombre','<span class="errors">:message</span>') !!}
	<br>
	<label>Email</label>
	<input class="form-control"  type="text" name="email" value="{{ $mensaje->email ?? old('nombre') }}">
	{!! $errors->first('email','<span class="errors">:message</span>') !!}
	@endunless
	<label>Mensaje</label>
	<textarea class="form-control" name="mensaje" rows="5" >{{ $mensaje->mensaje ?? old('mensaje') }}</textarea>
	{!! $errors->first('direccion','<span class="errors">:message</span>') !!}
	<br>
<br>
	<button class="btn btn-primary" type="submit" >{{ $btnText ?? 'Guadar' }}</button>
</div>
</div>