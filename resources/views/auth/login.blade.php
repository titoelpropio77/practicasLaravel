@extends('layouts.layout')

@section('content')
	<h1>login</h1>
	<form class="form-inline" action="login" method="post">
		<input class="form-control" type="text" name="email"  placeholder="email">
		<br>
	{!! csrf_field() !!}
		
		<input class="form-control" type="password" name="password">
		<input class="btn btn-primary" type="submit" name="adfad" value="entrar">
	</form>
@stop