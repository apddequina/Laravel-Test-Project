@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Ticket Types</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive card-body">

                        <h4 class="card-title">Ticket Types</h4>

                        <table id="datatable" class="table table-bordered nowrap" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Department</th>
                                <th>Created at</th>
                                <th>Status</th>
                                
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($allTickets as $ticket)
                                <tr data-bs-toggle="modal" data-bs-target="#descriptionModal-{{ $ticket->id }}" style="cursor:pointer;">
                                    <td>{{ $ticket->name }}</td>
                                        <td>{{ $ticket->email }}</td>
                                        <td>{{ $ticket->phone }}</td>
                                        <td>{{ $ticket->subject }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#descriptionModal-{{ $ticket->id }}">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                        </td>
                                        <td>{{ $ticket->ticket_type }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</td>
                                        <td>
                                        @if($ticket->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($ticket->status === 'noted')
                                            <span class="badge bg-success">Noted</span>
                                        @elseif($ticket->status === 'closed')
                                            <span class="badge bg-secondary">Closed</span>
                                        @else
                                            <span class="badge bg-info">{{ ucfirst($ticket->status) }}</span>
                                        @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal-{{ $ticket->id }}">
                                                <i class="fas fa-edit"></i> Update Feedback
                                            </button>
                                            
                                            <!-- Delete button -->
                                            <form action="{{ route('delete-ticket', ['id' => $ticket->id, 'type' => $ticket->ticket_type]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>


                                <!-- Feedback Modal -->
                                <div class="modal fade" id="feedbackModal-{{ $ticket->id }}" tabindex="-1" aria-labelledby="feedbackModalLabel-{{ $ticket->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <form action="{{ route('update-ticket', ['id' => $ticket->id, 'type' => $ticket->ticket_type]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <!-- Simple header -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feedbackModalLabel-{{ $ticket->id }}">Feedback for {{ $ticket->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <textarea id="editor-{{ $ticket->id }}" name="feedback" style="min-height: 300px;">{!! $ticket->feedback !!}</textarea>
                                                        <input type="hidden" name="status" value="noted">
                                                    </div>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save Feedback</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal for Full Description -->
                                <div class="modal fade" id="descriptionModal-{{ $ticket->id }}" tabindex="-1" aria-labelledby="descriptionModalLabel-{{ $ticket->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="descriptionModalLabel-{{ $ticket->id }}">Description for {{ $ticket->subject }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ $ticket->description }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    
                            @endforeach
                          
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        


    </div>
</div> 

@endsection

