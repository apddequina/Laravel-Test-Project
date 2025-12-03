@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- Welcome Message -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-light p-4 rounded shadow-sm text-center">
                    <h2 class="mb-2">Welcome, {{ Auth::user()->name }}!</h2>
                    <p class="text-muted">Manage all support tickets, respond to feedback, and keep your customers happy.</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Tickets</h5>
                        <p class="card-text display-5">{{ $totalTickets ?? 0 }}</p>
                        <a href="{{ route('all-tickets') }}" class="btn btn-primary btn-sm">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pending Tickets</h5>
                        <p class="card-text display-5">{{ $pendingTickets ?? 0 }}</p>
                        <a href="{{ route('all-tickets') }}?status=pending" class="btn btn-warning btn-sm">View Pending</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tickets Noted</h5>
                        <p class="card-text display-5">{{ $notedTickets ?? 0 }}</p>
                        <a href="{{ route('all-tickets') }}?status=noted" class="btn btn-success btn-sm">View Noted</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Quick Actions</h4>
                        <div class="d-flex gap-2">
                            <a href="{{ route('support-form') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create New Ticket</a>
                            <a href="{{ route('all-tickets') }}" class="btn btn-primary"><i class="fas fa-ticket-alt"></i> Manage Tickets</a>
                            <a href="{{ route('all-tickets') }}?status=noted" class="btn btn-info"><i class="fas fa-check-circle"></i> View Feedback</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
