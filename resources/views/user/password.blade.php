@extends('imports.main.layout')

@section('title', 'User Edit')

{{-- @section('head') @endsection --}}

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('user_view', [$user->id])}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-eye"></i> View User Profile</a>
                </div>
                <h4 class="page-title">Change Password: {{ $user->name }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <center>
                                    <img src="{{ asset('assets\images\\' . $user->image) }}" alt="" class="img-thumbnail" style="height: 150px;"><br>
                                    <h3>{{ $user->name }}</h3>
                                </center>
                            </div>
                            <div class="col-md-8 text-end">
                                <form action="{{ route('user_password_update') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 row">
                                                <label for="example-email-input" class="col-sm-4 col-form-label text-end">Previous Password <span class="text-danger font-weight-bold">*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="prev_pass" placeholder="Enter Previous Password" id="" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 row">
                                                <label for="example-email-input" class="col-sm-4 col-form-label text-end">New Password <span class="text-danger font-weight-bold">*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="password" name="new_pass" id="new_pass" placeholder="Enter New Password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 row">
                                                <label for="example-email-input" class="col-sm-4 col-form-label text-end">Confirm Password <span class="text-danger font-weight-bold">*</span></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-3">
                                            <center>
                                                <input type="hidden" name="id" value="{{ $user->id }}" id="">
                                                <input type="submit" value="Change Password" class="form-control btn btn-dark">
                                            </center>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

