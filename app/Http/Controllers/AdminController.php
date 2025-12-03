<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
    // All database connections for ticket types
    $connections = [
        'technical_db', 
        'billing_db', 
        'product_db', 
        'general_db', 
        'feedback_db'
    ];

    $totalTickets = 0;
    $pendingTickets = 0;
    $notedTickets = 0;

    foreach ($connections as $connection) {
        $tickets = DB::connection($connection)->table('tickets')->get();

        $totalTickets += $tickets->count();
        $pendingTickets += $tickets->where('status', 'pending')->count();
        $notedTickets += $tickets->where('status', 'noted')->count();
    }

    return view('admin.index', compact('totalTickets', 'pendingTickets', 'notedTickets'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully', 
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);

    }

    public function Profile(){
        $id = Auth::user()->id; 
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditProfile(){
        $id = Auth::user()->id; 
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id; 
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        $data->save();

        $notification = array(
        'message' => "Admin Profile Updated Successfully",
        'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
        
    }

    

}
