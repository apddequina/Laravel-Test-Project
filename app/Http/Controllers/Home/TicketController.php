<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    //
    public function SupportForm(){
        $ticket_type = TicketType::all();
        return view('admin.ticket.ticket_form', compact('ticket_type'));
    }

    public function StoreTicket(Request $request){
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => ['required','string','max:30','regex:/^[0-9+\-\s()]*$/'],
            'subject'     => 'required|string|max:255',
            'ticket_type' => 'required',
            'description' => 'required',
        ],[
            'phone.regex' => 'Phone number may contain only digits, spaces, +, - and parentheses.',
        ]);

         // Map ticket type to database connection
         $connectionMap = [
            'technical' => 'technical_db',
            'billing'   => 'billing_db',
            'product'   => 'product_db',
            'inquiry'   => 'general_db',
            'feedback'  => 'feedback_db',
        ];

        $ticketTypeDisplay = [
            'technical' => 'Technical Issues',
            'billing'   => 'Account & Billing',
            'product'   => 'Product & Service',
            'inquiry'   => 'General Inquiry',
            'feedback'  => 'Feedback & Suggestions',
        ];
        $ticketType = $request->ticket_type;

        if (!isset($connectionMap[$ticketType])) {
            return back()->withErrors(['ticket_type' => 'Invalid ticket type']);
        }

        $connection = $connectionMap[$ticketType];

        // Insert into the correct database
        DB::connection($connection)->table('tickets')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'ticket_type' => $ticketTypeDisplay[$ticketType],
            'description' => $request->description,
            'status' => 'pending',          // default
            'feedback' => null,             // initially empty
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()
        ->with('message', 'Ticket submitted successfully')
        ->with('alert-type', 'success');

    }

    public function AllTickets()
    {
        // Define all connections with a readable ticket type
        $connections = [
            'technical_db' => 'Technical Issues',
            'billing_db'   => 'Account & Billing',
            'product_db'   => 'Product & Service',
            'general_db'   => 'General Inquiry',
            'feedback_db'  => 'Feedback & Suggestions',
        ];

        $allTickets = [];

        foreach ($connections as $connection => $type) {
            $tickets = DB::connection($connection)->table('tickets')->get();
            
            foreach ($tickets as $ticket) {
                $ticket->ticket_type = $type; // ensure type is mapped
                $allTickets[] = $ticket;
            }
        }

        // Optional: sort tickets by creation date descending
        $allTickets = collect($allTickets)->sortByDesc('created_at');

        return view('admin.ticket.all_tickets', compact('allTickets'));
    }

    public function UpdateTicket(Request $request, $id)
{
    $connections = [
        'technical_db' => 'Technical Issues',
        'billing_db'   => 'Account & Billing',
        'product_db'   => 'Product & Service',
        'general_db'   => 'General Inquiry',
        'feedback_db'  => 'Feedback & Suggestions',
    ];

    foreach ($connections as $connection => $type) {
        $ticket = DB::connection($connection)->table('tickets')->where('id', $id)->first();
        if ($ticket) {
            DB::connection($connection)->table('tickets')->where('id', $id)->update([
                'feedback' => $request->feedback,
                'status' => 'noted',
                'updated_at' => now(),
            ]);
            break;
        }
    }

    return redirect()->back()->with('message', 'Feedback saved and ticket marked as noted.')
                             ->with('alert-type', 'success');
}

public function DeleteTicket($id, $type)
{
    $connectionMap = [
        'Technical Issues'      => 'technical_db',
        'Account & Billing'     => 'billing_db',
        'Product & Service'     => 'product_db',
        'General Inquiry'       => 'general_db',
        'Feedback & Suggestions'=> 'feedback_db',
    ];

    if (!isset($connectionMap[$type])) {
        return redirect()->back()->with('message', 'Invalid ticket type')->with('alert-type', 'error');
    }

    $connection = $connectionMap[$type];

    DB::connection($connection)->table('tickets')->where('id', $id)->delete();

    return redirect()->back()->with('message', 'Ticket deleted successfully')->with('alert-type', 'success');
}





}
