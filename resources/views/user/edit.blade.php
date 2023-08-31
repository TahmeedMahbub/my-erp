@extends('imports.main.layout')

@section('title', 'User Edit')

@section('head')
    <link href="{{asset('assets/plugins/select/selectr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datepicker/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('roles')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All User List</a>
                </div>
                <h4 class="page-title">Create User Role</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('user_update') }}" id="user_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="branch_select" class="col-sm-4 col-form-label text-end">Branch <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <select id="branch_id" class="form-select" name="branch_id" required>
                                                @foreach ($branches as $branch)
                                                    <option class="form-select" value="{{ $branch->id }}" {{ $branch->id == $user->branch_id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="role_select" class="col-sm-4 col-form-label text-end">Role <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <select id="role_id" class="form-select" name="role_id" required>
                                                @foreach ($roles as $role)
                                                    <option class="form-select" value="{{ $role->id }}" data-m_role="{{ $role->manager_role_id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label for="branch_select" class="col-sm-4 col-form-label text-end">Manager Role</label>
                                        <div class="col-sm-8">
                                            <select id="m_role_id" class="form-select" name="m_role_id" required>
                                                <option value="">Select Manager Role</option>
                                                @foreach ($roles as $role)
                                                    <option class="form-select" value="{{ $role->id }}" {{ $role->id == $user->manager_role_id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label for="branch_select" class="col-sm-4 col-form-label text-end">Manager</label>
                                        <div class="col-sm-8">
                                            <select id="manager_id" class="form-select" name="manager_id" required>
                                                <option class="form-select" value="">Select Manager</option>
                                                @foreach ($users as $m_user)
                                                    <option class="form-select" value="{{ $m_user->id }}" {{ $user->manager_id == $m_user->id ? 'selected' : '' }}>{{ $m_user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-end">Full Name <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Enter Full Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-url-input" class="col-sm-4 col-form-label text-end">Username <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Enter Unique Username" id="username" name="username" value="{{ $user->username }}" autocomplete="off"  minlength="5" readonly>
                                                    <span class="input-group-text text-warning" id="basic-addon2"><i class="mdi mdi-alert-circle-outline"></i>Cannot Change</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-sm-4 col-form-label text-end">Phone <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-text">+880</div>
                                                    <input class="form-control" type="number" step="1" name="phone" value="{{ $user->phone }}" placeholder="Enter Phone Number" min="1000000000" max="9999999999" maxlength="10" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-date-input" class="col-sm-4 col-form-label text-end">Secondary Phone</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="phone_1" value="{{ $user->phone_1 }}" placeholder="Enter Emergency Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-sm-4 col-form-label text-end">Email <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="email" placeholder="Enter Email Address" name="email" value="{{ $user->email }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-end">Company</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="company" value="{{ $user->company }}" placeholder="Enter Company Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-password-input" class="col-sm-4 col-form-label text-end">Password <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password" name="password" id="password" value="" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-week-input" class="col-sm-4 col-form-label text-end">Confirm Pass <span class="text-danger font-weight-bold">*</span></label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="password" name="confirm_pass" value="" id="confirm_pass" placeholder="Confirm Your Password" required>
                                                    <div id="pass_notice"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Date Of Birth</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" name="dob" value="{{ $user->date_of_birth }}" placeholder="Enter Date Of Birth">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Joining Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="date" name="joining_date" value="{{ $user->joining_date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Profile Image</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" name="image" value="" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">NID Card</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" name="nid_image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Address</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="address" id="" cols="30" rows="5">{{ $user->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end" name="details">Details</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="details" id="" cols="30" rows="5">{{ $user->details }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-lg-3">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <input class="form-control btn btn-warning" type="Submit" value="Edit User">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('script')
    <script>

        $("#role_id").change(function() {
            var selected_role   = $(this).val();
            var manager_role    = $(this).find("option:selected").attr("data-m_role");
            var roles           = {!! json_encode($roles) !!};
            var m_role_opts     = $("#m_role_id");
            var man_select      = $("#manager_id");
            var manager_opts = '<option class="form-select" value="">Select Manager</option>';

            m_role_opts.empty();
            m_role_opts.append($('<option>', {
                        value: "",
                        text: "Select Manager Role"
                    }));

            $.each(roles, function(index, role) {
                m_role_opts.append($('<option>', {
                    value: role.id,
                    text: role.role_name,
                    selected: role.id == manager_role
                }));
            });

            if(manager_role !== "" && manager_role !== null)
            {
                var managers_url = "{!! route('user_by_role') !!}" + "/" + manager_role;
                $.ajax({
                    type: "get",
                    url: managers_url,
                    success: function (response) {
                        $.each(response.users, function (index, user) {
                            manager_opts += '<option class="form-select" value="'+user.id+'">'+user.name+'</option>'
                        });
                        man_select.empty();
                        man_select.append(manager_opts);
                    }
                });
            }
            else
            {
                var users = {!! json_encode($users) !!};
                $.each(users, function (index, user) {
                    manager_opts += '<option class="form-select" value="'+user.id+'">'+user.name+'</option>'
                });
                man_select.empty();
                man_select.append(manager_opts);
            }
        });

        $("#m_role_id").change(function() {
            var manager_role    = $(this).val();
            var man_select      = $("#manager_id");
            var manager_opts    = '<option class="form-select" value="">Select Manager</option>';
            var managers_url    = "{!! route('user_by_role') !!}" + "/" + manager_role;
            $.ajax({
                type: "get",
                url: managers_url,
                success: function (response) {
                    $.each(response.users, function (index, user) {
                        manager_opts += '<option class="form-select" value="'+user.id+'">'+user.name+'</option>'
                    });
                    man_select.empty();
                    man_select.append(manager_opts);
                }
            });

        });

    $(document).ready(function() {

        $('#user_form').submit(function(event) {

            const passwordValue = $("#password").val();
            const confirmPassValue = $("#confirm_pass").val();

            if (passwordValue != confirmPassValue) {
                event.preventDefault();
                var notice = '<span class="input-group-text text-danger" id="basic-addon2"><i class="mdi mdi-close-circle-outline"></i> Password not matched!!</span>';
                $("#pass_notice").empty();
                $("#pass_notice").append(notice);
            }
        });
    });
    </script>
@endsection
