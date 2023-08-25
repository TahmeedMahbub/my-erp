@extends('imports.main.layout')

@section('title', 'Roles Edit')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('roles')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All User Roles</a>
                </div>
                <h4 class="page-title">Edit User Role</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('roles_update') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Role Name <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="role_name" placeholder="Enter Role Name (Required)" value="{{ $role->role_name }}" id="example-text-input" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-3 col-form-label text-end">Role Details <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="role_details" placeholder="Enter Role Details (Required)" value="{{ $role->details }}" id="example-url-input" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-3 row justify-content-end">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id" value="{{ $role->id }}">
                                            <input class="form-control btn btn-warning" type="submit" value="Edit Role">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--end card-body-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection
