@extends('imports.main.layout')

@section('title', 'Roles Create')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('roles')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All User Roles</a>
                </div>
                <h4 class="page-title">Create User Role</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('roles_store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end">Role Name <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="role_name" placeholder="Enter Role Name (Required)" id="example-text-input" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Manger Role</label>
                                        <div class="col-sm-9">
                                            <select name="manager_role" class="form-select">
                                                <option value="">Select Manager Role</option>
                                                @foreach ($roles as $m_role)
                                                    <option value="{{ $m_role->id }}">{{ $m_role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10">
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label text-end">Role Details <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="role_details" placeholder="Enter Role Details (Required)" id="example-url-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-3 row justify-content-end">
                                        <div class="col-sm-10">
                                            <input class="form-control btn btn-purple" type="submit" value="Create Role">
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
