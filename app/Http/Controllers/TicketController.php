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
        } else{

            foreach($tickets as $ticket){

                if($ticket->status == 0){

                    $ticket->message = "Richiesta aperta";
                }else {
                    $ticket->message = "Richiesta conclusa";
                }
            }
            return view('user/ticket', compact('tickets'));
        }

    }

    public function admin_index()
    {
        $tickets = Ticket::orderBy('tickets.created_at', 'desc')->get();
        if($tickets->isEmpty()){
            $open_tickets = '';
            $close_tickets = '';
            return view('admin/ticket', compact('open_tickets', 'close_tickets'));
        } else{

            $open_tickets = Ticket::orderBy('tickets.created_at', 'desc')->where('status', '=', '0')->get();
            
            $close_tickets = Ticket::orderBy('tickets.created_at', 'desc')->where('status', '=', '1')->get();

            if($open_tickets->isEmpty()){
                $open_tickets = '';
            } else{
                foreach($open_tickets as $ticket){

                    //inserisco il nome dell'utente
                    $ticket->user_name = app('App\Http\Controllers\UserController')->name($ticket->user_id);
      
                }
            }

            if($close_tickets->isEmpty()){
                $close_tickets = '';
            } else{
                foreach($close_tickets as $ticket){

                    //inserisco il nome dell'utente
                    $ticket->user_name = app('App\Http\Controllers\UserController')->name($ticket->user_id);
      
                }
            }
        }

        return view('admin/ticket', compact('open_tickets', 'close_tickets'));
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
        $ticket->type = $request->type;
        $ticket->result = "La richiesta non è ancora stata presa in carico dall'admin";
        //Quando è a 0 la richiesta è aperta, a 1 è chiusa
        //di default viene quindi impostato a 0

        $ticket->save();
        return response()->json($ticket);
    }

    //funzione per cambiare stato di un ticket 
    //NON IN USO
    public function change_status($id){
        
        $ticket = Ticket::find($id);
        
        if($ticket->status == true){

            //quando la richiesta è aperta, chiudila
            $ticket->update(['status' => false]);

        }else{

            //quando la risposta è chiusa, aprila
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
        $input = $request -> all(); 
        $ticket = Ticket::find($id);
        $ticket->update($input);

        return redirect()->route('ticket_index.adm');
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
