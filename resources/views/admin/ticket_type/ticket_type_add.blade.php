@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Ticket Type</h4>
                        <p class="card-title-desc">Create a name for the <code class="highlighter-rouge">Ticket Type</code>.</p>
                        
                        <form action="{{ route('store-ticket-type') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Ticket Type Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="ticket_type" placeholder="Enter Input here..." id="ticket-type-id">
                                    @error('ticket_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Save Ticket Type">

                        </form>
                        
                       
                        
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        


    </div>
</div> 

@endsection

