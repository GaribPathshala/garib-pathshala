<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketRaisedMail;
use App\Mail\TicketResolvedMail;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function RaiseTicket(Request $req)
    {        
        $req->validate([
            'name'      => ['required', 'max:255'],
            'mobile'    => ['nullable', 'numeric', 'digits_between:10,10'],
            'email'     => ['required', 'email',],
            'message'   => ['required', 'max:500'],
        ]);

        $ticket = new Ticket;

        $ticket->ticket_id = 'TID'.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $ticket->name = $req->name;
        $ticket->mobile = $req->mobile;
        $ticket->email = $req->email;
        $ticket->status = 'Open';
        $ticket->save();

        $db = Ticket::where('ticket_id',$ticket->ticket_id)->first();

        mail::to($req->email)->send(new TicketRaisedMail($db)); 
        
        return view('contact' , ['tid' => $ticket->ticket_id]);

    }

    public function index(Request $req)
    {
        $tickets = Ticket::get();

        return view('admin.tickets', ['tickets' => $tickets]);
    }
    public function manage($ticket_id)
    {
        $ticket = Ticket::where('ticket_id',$ticket_id)->first();

        return view('admin.manage-tickets', ['ticket' => $ticket]);
    }

    public function UpdateResolved($ticket_id)
    {
        $ticket = Ticket::where('ticket_id',$ticket_id)->first();

        if ($ticket->status == 'Resolved') {
            return back();
        } 
        
        else {
            Ticket::where('ticket_id', $ticket_id)->update([
                'status' => 'Resolved'
            ]);
    
            Mail::to($ticket->email)->send(new TicketResolvedMail($ticket));
        }
        
    }

    public function AdminTicketReply(Request $req)
    {
        dd($req);
    }
}
