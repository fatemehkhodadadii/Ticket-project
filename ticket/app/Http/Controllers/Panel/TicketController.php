<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    public function index()
    {
        if(Gate::allows('User'))
        {
            $tickets = Ticket::where("chid" , 0)->where(function($query){
                $query->Orwhere("receive_id" , auth()->user()->id);
                $query->Orwhere("send_id" , auth()->user()->id);

            })->orderByDesc("id")->paginate(10);
        }else{
            $tickets = Ticket::where("chid" , 0)->orderByDesc("id")->paginate(10);
        }
        return view("panel.tickets.index" , ['data' => $tickets]);
    }

    public function createTicket()
    {
        $receive_id = User::where('role', 'admin')->first()->id;
        return view("panel.tickets.create" , ["receive_id" => $receive_id]);
    }

    public function store(Request $request)
    {
        if($request->image){
            $img = UploadImg($request->image , "tickets");
        }

        $ticket = Ticket::create([
            "send_id" => auth()->user()->id,
            "receive_id" => $request->receive_id,
            "chid" => $request->chid,
            "title" => $request->title,
            "message" => $request->message,
            "image" => $img ?? "",
            "chid" => 0,
            "status" => $request->status ?? "pending",
            "code" => generateRandom(10),
        ]);

        $ticket->update([
            "ticket_id" => $ticket->id
        ]);

        return redirect()->route("tickets.edit" , $ticket->id);
    }

    public function edit(Ticket $ticket)
    {
        if(auth()->user()->id == $ticket->receive_id || auth()->user()->id == $ticket->send_id)
        {
            $tikets = Ticket::where("ticket_id" , $ticket->id)->orderBy("id" , "asc")->get();
            return view("panel.tickets.edit" , ["tickets" => $tikets , "data" => $ticket]);
        }else{
            abort(403);
        }
    }

    public function update(Ticket $ticket, Request $request)
    {
        if($request->image){
            $img = UploadImg($request->image , "tickets");
        }

        $data  = Ticket::where("chid" , 0)->where("id" , $ticket->id)->first();

        $data->update([
            "status" => "pending"
        ]);

        Ticket::create([
            "title" => $ticket->title,
            "send_id" => auth()->user()->id,
            "receive_id" => $request->receive_id,
            "ticket_id" => $ticket->id,
            "message" => $request->message ?? "",
            "image" => $img ?? "",
            "status" => $request->status ?? "pending",
            "code" => $ticket->code,
            "chid" => $ticket->id,
        ]);

        return back();
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return back();
    }

    public function changeStatus($id)
    {
        $data  = Ticket::where("chid" , 0)->where("ticket_id" , $id)->first();
        
        $data->update([
            "status" => request()->status
        ]);

        return back();
    }
}
