<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactosController extends Controller
{
	// protected $request;
	// public function __contruct(  Request  $_request)
	// {
	// 	$this->request = _request;
	// }

    public function index()
    {
    	return view( 'page.contactos' );
    }
    public function guardar(  Request  $request)
    {
    	$this->validate($request,[
    		'nombre' => 'required',
    		'email' => 'required|email'
    	]);
    	return $request->all();
    }
}
