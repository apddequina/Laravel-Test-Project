<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TicketTypeController extends Controller
{
    //
    public function AllTicketType(){
        $ticket_type = TicketType::all();
        return view('admin.ticket_type.ticket_type_all', compact('ticket_type'));
    }

    public function AddTicketType(){
        // $tickettype = TicketType::all();
        return view('admin.ticket_type.ticket_type_add');
    }

    public function StoreTicketType(Request $request){
        $request->validate([
            'ticket_type' => 'required'
        ],[
            'ticket_type.required' => 'Ticket Type Name is Required',
        ]);

            TicketType::create([
                'ticket_type' => $request->ticket_type
            ]); 
            $notification = array(
            'message' => 'Ticket Type Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all-ticket-type')->with($notification);

    }

    // Edit
    public function EditTicketType($id){
        $ticket = TicketType::findOrFail($id);
        return view('admin.ticket_type.ticket_type_edit', compact('ticket'));
    }

    // Update
    public function UpdateTicketType(Request $request, $id){
        $request->validate([
            'ticket_type' => 'required'
        ],[
            'ticket_type.required' => 'Ticket Type Name is Required',
        ]);

        $ticket = TicketType::findOrFail($id);
        $ticket->update([
            'ticket_type' => $request->ticket_type
        ]);

        $notification = array(
            'message' => 'Ticket Type Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all-ticket-type')->with($notification);
    }

    // Delete
    public function DeleteTicketType($id){
        $ticket = TicketType::findOrFail($id);
        $ticket->delete();

        $notification = array(
            'message' => 'Ticket Type Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all-ticket-type')->with($notification);
    }
    
    // public function data()
    // {
    //     return DataTables::of(TicketType::query())
    //         ->make(true);
    // }
}
