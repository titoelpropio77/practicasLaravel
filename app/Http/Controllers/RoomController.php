<?php

namespace App\Http\Controllers;

use App\Room;
use App\TypeRooms;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeRoom = TypeRooms::all();
        return view('rooms.index',compact('typeRoom'));
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
                Room::create($request->all());
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
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $result['data'] = Room::with('typeRoom')->get();
        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit( $room)
    {
        try {
            $clientList[] = Room::find($room);
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
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        if ( $request->ajax() )
        {
            try {
                $result[ 'status' ] = true;
                $result[ 'message' ] = 'Modificado Correctamente';
                $room = Room::findOrFail($id);
                $room->update($request->all());
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
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        try {
            $room->delete();
            $result['status'] = true;
        } catch (Exception $e) {

            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return response()->json($result);
    }
}
