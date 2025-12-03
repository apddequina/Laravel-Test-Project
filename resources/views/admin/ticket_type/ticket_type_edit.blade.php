@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <h4>Edit Ticket Type</h4>

        <form action="{{ route('update-ticket-type', $ticket->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ticket_type" class="form-label">Ticket Type Name</label>
                <input type="text" name="ticket_type" class="form-control" value="{{ $ticket->ticket_type }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Ticket Type</button>
            <a href="{{ route('all-ticket-type') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
