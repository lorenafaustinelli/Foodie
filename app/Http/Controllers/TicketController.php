<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ticket;
use Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id(); 
        $tickets = Ticket::where('user_id', '=', $user_id)->orderBy('tickets.created_at', 'desc')->get();
        if($tickets->isEmpty()){
            $tickets = '';
            return view('user/ticket', compact('tickets'));
        }

        return view('/user/ticket', compact('tickets'));
    }

    public function admin_index()
    {
        $tickets = Ticket::orderBy('tickets.created_at', 'desc')->get();
        if($tickets->isEmpty()){
            $tickets = '';
            return view('admin/ticket', compact('tickets'));
        }

        return view('admin/ticket', compact('tickets'));
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
        $ticket = new Ticket();
        $ticket->user_id = $request->user_id;
        $ticket->text = $request->text;
        //Quando è a 0 la richiesta è aperta, a 1 è chiusa

        $ticket->save();
        return response()->json($ticket);
    }

    //funzione per cambiare stato di un ticket
    public function change_status($id){
        
        $ticket = Ticket::find($id);
        
        if($ticket->status == true){
            //Quando la richiesta è aperta chiudila
            $ticket->update(['status' => false]);

        }else{
            //quando la richiesta è chiusa aprila
            $ticket->update(['status' => true]);

        }

        return redirect()->route('ticket_index.adm');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
