<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
use App\Message;
class ContactanosController extends Controller
{
	protected $requested;
	public function __construct( Request $request )
	{
		//$this->requested= $request;

        $this->middleware('guest');
		$this->middleware('example');

	}
    public  function index()
    {
    	return view('page/contactanos');
    }

    public function mensajes( CreateMessageRequest $request)
    {
       
    	    	/*return redirect()->route('contactanos')
    	->with('info','ty mensaje ha sido enviado');*/
   /* return response()->json( ['data' =>$data,
    	 ],202)
->header('TOKEN','secret');*/
    }
}
