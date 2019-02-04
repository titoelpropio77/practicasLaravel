<?php

namespace App\Http\Controllers;

use App\DetailsRental;
use App\Room;
use App\Client;
use Illuminate\Http\Request;

class DetailsRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::All()->where('status','LIBRE');
        $client = Client::All();
        $title = 'Detalle de renta';
        return view( 'detailsrental.index',compact('room','client','title') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( $request->ajax() ) 
        {
            try {
                $result['status'] = true;
                $result['message'] = 'Guardado Correctamente';
                $request->include_light=$reques->include_light ?? 'NO';
                $request->include_water=$reques->include_water ?? 'NO';
                DetailsRental::create($request->all());
            } catch (Exception $e) 
            {
                $result['status'] = false;
                $result['message'] = 'Modificado Correctamente';
            }
            
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\DetailsRental  $detailsRental
     * @return \Illuminate\Http\Response
     */
    public function show(DetailsRental $detailsRental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailsRental  $detailsRental
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailsRental $detailsRental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailsRental  $detailsRental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailsRental $detailsRental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailsRental  $detailsRental
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailsRental $detailsRental)
    {
        //
    }
}
