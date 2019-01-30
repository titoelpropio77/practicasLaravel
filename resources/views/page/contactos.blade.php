
@extends('layout/layout')

@section('content')
<form action="contactos" method="post" >
	<label>nombre</label>
<input type="text" name="nombre" value="{{ old('nombre') }}">
{{ $errors->first('nombre') }}
<br>
<label>direccion</label>
<input type="text" name="direccion"><br>
<label>email</label>
<input type="email" name="email">
{{ $errors->first('email') }}
<br>
<button type="submit" >guardar</button>
</form>
@endsection