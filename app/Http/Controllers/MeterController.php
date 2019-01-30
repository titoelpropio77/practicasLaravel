<?php

namespace App\Http\Controllers;

use App\Meter;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meters.index');
    }
    public function getMeterAll()
    {
        $result['data'] = Meter::all();
        return response()->json($result);
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
        try {
            $result['status'] = true;
            $result['message'] = 'Guardado Correctamente';
            Meter::create($request->all());
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return response()->json( $result );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function show(Meter $meter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function edit( $meter)
    {
       try {
            $clientList = Meter::find($meter);
            $result[ 'data' ] = $clientList;
            $result[ 'status' ] = true;
            return response()->json( $result );
        } catch (Exception $e) {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meter $meter)
    {
        try {
            $meter->fill( $request->all() );
             $result[ 'status' ] = true;
        } catch (Exception $e) {
             $result[ 'message' ] = $e->getMessage();
             $result[ 'status' ] = true;
        }
         return response()->json( $result );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meter $meter)
    {
        try {
            $meter->delete();
             $result[ 'status' ] = true;
        } catch (Exception $e) {
             $result[ 'message' ] = $e->getMessage();
             $result[ 'status' ] = true;
        }
         return response()->json( $result );
    }
}
