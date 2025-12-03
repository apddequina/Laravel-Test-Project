@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>
                        
                        <form method="post" action="{{ route('store.profile') }}">
                            @csrf
                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" id="example-text-input" value="{{ $editData->name }}">
                                </div>
                            </div>
                            {{-- email --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" id="example-text-input" value="{{ $editData->email }}">
                                </div>
                            </div>
                            {{-- username --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" id="example-text-input" value="{{ $editData->username }}">
                                </div>
                            </div>

                            
                        <!-- end row -->
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

            

        </div>

    </div>
</div>

@endsection