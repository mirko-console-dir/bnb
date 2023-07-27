<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::id();
        $apartments = Apartment::where('user_id',"=", $idUser)->get();
        $apartmentsAll = Apartment::all();
        $messagesXapartment = [];
        // $messages = Message::where('apartment_id',"=", $apartments->id)->get();
        // dd($apartments);
        foreach ($apartments as $apartment) {
            
            $messages = Message::where('apartment_id',"=", $apartment->id)->get();
            // dd($messages);
            // dd($messages->apartment_id);
            foreach ($messages as $key => $message) {
                // dd($message['msg_txt']);
                // $message->$idUser = $apartment->id;

                // ... aggiungo un campo chiamato idUser con valore idUser(li vede differenti)
                $message->idUser = $idUser;
                array_push($messagesXapartment, $message);
            }
        }
        
        // dd($apartments);
        // dd($messagesXapartment);
        $data = [
            'messages' => $messagesXapartment,
            'apartments' => $apartments,
            'apartmentsAll' => $apartmentsAll
        ];
        // dd($data);
        return view('admin.message.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($message)
    {
        $idUser = Auth::id();
        $apartments = Apartment::where('user_id',"=", $idUser)->get();
        $apartmentsAll = Apartment::all();
        $message_selected = Message::where('id', $message)->firstOrFail();
        // $message_selected->status = 0;

        $data = [
            'message' => $message_selected,
            'apartment' => $apartments,
            'apartmentsAll' => $apartmentsAll
        ];
        
        return view('admin.message.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('message.index');
    }
}
