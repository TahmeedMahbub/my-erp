@extends('imports.main.layout')

@section('title', 'User Create')

@section('head')
    <link href="{{asset('assets/plugins/select/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datepicker/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('roles')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All User List</a>
                </div>
                <h4 class="page-title">Create User Role</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="branch_select" class="col-sm-2 col-form-label text-end">Branch</label>
                                    <div class="col-sm-10">
                                        <select id="branch_select" class="form-select">
                                            <option class="form-select" value="">Select Branch</option>
                                            <option class="form-select" value="value-2">Value 2</option>
                                            <option class="form-select" value="value-3">Value 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="role_select" class="col-sm-2 col-form-label text-end">Role</label>
                                    <div class="col-sm-10">
                                        <select id="role_select" class="form-select">
                                            <option value="">Select Role</option>
                                            <option value="value-2">Value 2</option>
                                            <option value="value-3">Value 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--end card-header-->
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Full Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Enter Full Name" id="example-text-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-end">Phone</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-text">+880</div>
                                            <input class="form-control" type="number" step="1" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-end">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-end">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-month-input" class="col-sm-2 col-form-label text-end">Date Of Birth</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" placeholder="Enter Date Of Birth" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-month-input" class="col-sm-2 col-form-label text-end">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-month-input" class="col-sm-2 col-form-label text-end">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-end">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" placeholder="Enter Unique Username" id="example-url-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-date-input" class="col-sm-2 col-form-label text-end">Secondary Phone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" placeholder="Enter Phone Number" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Company</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Enter Company Name" id="example-text-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-week-input" class="col-sm-2 col-form-label text-end">Confirm Pass</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" placeholder="Confirm Your Password" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-month-input" class="col-sm-2 col-form-label text-end">Joining Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-month-input" class="col-sm-2 col-form-label text-end">NID Card</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-month-input" class="col-sm-2 col-form-label text-end">Details</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection


@section('script')
    <script src="{{asset('assets/plugins/select/selectr.min.js')}}"></script>
    <script src="{{asset('assets/plugins/huebee/huebee.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datepicker/datepicker-full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('assets/plugins/imask/imask.js')}}"></script>
    <script src="{{asset('assets/pages/forms-advanced.js')}}"></script>
@endsection
