@extends('layouts.layout')
@section('content')
@if( session()->has('info') )
<h3>{{ session('info') }}</h3>
@else
<form method="POST"  action="contactos" >
<div class="row">
	<div class="col-sm-4">
	{!! csrf_field() !!}
	<label>Nombre</label>
	<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
	{!! $errors->first('nombre','<span class="errors">:message</span>') !!}
	<br>
	<label>Email</label>
	<input class="form-control"  type="text" name="email"> 
	{!! $errors->first('email','<span class="errors">:message</span>') !!}
	<label>Mensaje</label>
	<textarea class="form-control" name="mensaje" rows="5" id="comment">	</textarea>	
	{!! $errors->first('direccion','<span class="errors">:message</span>') !!}
	<br>
<br>
	<button class="btn btn-primary" type="submit" >guardar</button>
@endif
</div>
</div>
</form>

@stop
