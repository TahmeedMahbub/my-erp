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
        <form action="{{ route('user_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class=" row">
                                        <label for="branch_select" class="col-sm-4 col-form-label text-end">Branch <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <select id="default1" class="form-select" required>
                                                <option class="form-select" value="">Select Branch</option>
                                                <option class="form-select" value="value-2">Value 2</option>
                                                <option class="form-select" value="value-3">Value 3</option>
                                                <option class="form-select" value="value-2">Value 2</option>
                                                <option class="form-select" value="value-3">Value 3</option>
                                                <option class="form-select" value="value-2">Value 2</option>
                                                <option class="form-select" value="value-3">Value 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label for="role_select" class="col-sm-4 col-form-label text-end">Role <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <select id="default2" class="form-select" required>
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
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-end">Full Name <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="name" placeholder="Enter Full Name" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-sm-4 col-form-label text-end">Phone <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-text">+880</div>
                                                    <input class="form-control" type="number" step="1" name="phone" placeholder="Enter Phone Number" min="1000000000" max="9999999999" maxlength="10" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-sm-4 col-form-label text-end">Email <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="email" placeholder="Enter Email Address" name="email" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-password-input" class="col-sm-4 col-form-label text-end">Password <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Date Of Birth</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" name="dob" placeholder="Enter Date Of Birth">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Profile Image</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" name="image" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Address</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="address" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-url-input" class="col-sm-4 col-form-label text-end">Username <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Enter Unique Username" name="username" autocomplete="off"  minlength="5" required>
                                                    <span class="input-group-text text-success" id="basic-addon2"><i class="mdi mdi-check-circle-outline"></i> Available</span>
                                                    <span class="input-group-text text-danger" id="basic-addon2"><i class="mdi mdi-alert-circle-outline"></i> Occupied</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-date-input" class="col-sm-4 col-form-label text-end">Secondary Phone</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="phone_1" placeholder="Enter Emergency Phone Number">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-end">Company</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="company" placeholder="Enter Company Name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-week-input" class="col-sm-4 col-form-label text-end">Confirm Pass <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm Your Password" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Joining Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" name="joining_date">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">NID Card</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" name="nid_image" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end" name="details">Details</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-3">
                                    <div class="col-lg-3">

                                        <input class="form-control btn btn-success" type="Submit" value="Create User">
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </div> <!--end col-->
        </form>
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