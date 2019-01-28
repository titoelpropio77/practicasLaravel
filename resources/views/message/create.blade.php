@extends('layouts.layout')
@section('content')
@if( session()->has('info') )
<h3>{{ session('info') }}</h3>
@else
<form method="POST"  action="{{ route('mensaje.store') }}" >
	@include('message.form',['mensaje'=> new App\Message])
</form>
@endif

@stop
