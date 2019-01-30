
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Mail;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mensajes = Message::with(['user','note'])->get();
        return view('message.index',compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Message::create($request->all());
       //dd(func_get_args());
        if (auth()->check())
        {
            auth()->user()->messages()->save($message)  ;
            //Mail::send('vista', [], function($ObjetoMessage));

        }
         Mail::send('emails.contact', ['msg' =>$message], function($m) use ($message){
                $m->to($message->email, $message->name)->subject('el mensaje fue recibido');
            });
        return redirect()->route('mensaje.create')->with('info','Hemos recibido tu mensaje');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensajes = Message::find($id);
        return view('message.show',compact('mensajes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensaje = Message::find($id);
        return view('message.edit',compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
