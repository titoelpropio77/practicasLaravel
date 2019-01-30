<?php

namespace App\Http\Controllers;

use App\TypeRooms;
use Illuminate\Http\Request;

class TypeRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'typeroom.index' );
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
                $result[ 'status' ] = true;
                $result[ 'message' ] = 'Guardado Correctamente';
                TypeRooms::create($request->all());
            } catch (Exception $e) {
                $result[ 'status' ] = false;
                $result[ 'message' ] = $e->getMessage();
            }
            return response()->json( $result );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeRooms  $typeRooms
     * @return \Illuminate\Http\Response
     */
    public function getTypeRoomAll()
    {
        $result['data'] = TypeRooms::all();
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeRooms  $typeRooms
     * @return \Illuminate\Http\Response
     */
    public function edit( $typeRooms)
    {
        try {
            $clientList[] = TypeRooms::find($typeRooms);
            $result[ 'data' ] = $clientList;
            $result[ 'status' ] = true;
        } catch (Exception $e) {
            $result[ 'status' ] = false;
            $result[ 'message' ] = $e->getMessage();
        }
       return response()->json( $result );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeRooms  $typeRooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        if ( $request->ajax() )
        {
            try {
                $result[ 'status' ] = true;
                $result[ 'message' ] = 'Modificado Correctamente';
                $typeRooms = TypeRooms::findOrFail($id);
                $typeRooms->update($request->all());
            } catch (Exception $e) {
                $result[ 'status' ] = false;
                $result[ 'message' ] = $e->getMessage();
            }
            return response()->json( $result );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeRooms  $typeRooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeRooms $typeRooms)
    {
        try {
            $typeRooms->delete();
            $result['status'] = true;
        } catch (Exception $e) {

            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return response()->json($result);
    }
}
