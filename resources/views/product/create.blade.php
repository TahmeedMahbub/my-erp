@extends('imports.main.layout')

@section('title', 'Contact Create')

{{-- @section('head') @endsection --}}

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('contact')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Contact List</a>
                </div>
                <h4 class="page-title">Create Contact</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('contact_store') }}" id="contact_form" method="post" enctype="multipart/form-data">
            @csrf
            {{-- @if(count($errors)) <span class="text-danger">{{ $errors }}</span> @endif --}}
            <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="category_select" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Category</label>
                                        <div class="col-sm-8">
                                            <select id="category_id" class="form-select" name="category_id" required>
                                                <option value="">Select Recent Category</option>
                                                @foreach ($categories as $category)
                                                    <option class="form-select" value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="branch_select" class="col-sm-4 col-form-label text-end">Branch</label>
                                        <div class="col-sm-8">
                                            <select id="default1" class="form-select" name="branch_id">
                                                <option class="form-select" value="">Select Branch</option>
                                                @foreach ($branches as $branch)
                                                    <option class="form-select" value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
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
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Full Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="name" placeholder="Enter Full Name" value="{{ old('name') }}" required>
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-url-input" class="col-sm-4 col-form-label text-end">Contact Code</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="{{ old('code') }}" placeholder="Enter Unique Contact Code" name="code">
                                                <span class="text-danger">{{ $errors->first('code') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Phone</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-text">+880</div>
                                                    <input class="form-control" type="number" value="{{ old('phone') }}" step="1" name="phone" placeholder="Enter Phone Number" min="1000000000" max="9999999999" maxlength="10" required>
                                                </div>
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-date-input" class="col-sm-4 col-form-label text-end">Secondary Phone</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="{{ old('phone_1') }}" name="phone_1" placeholder="Enter Emergency Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-sm-4 col-form-label text-end">Email</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="email" value="{{ old('email') }}" placeholder="Enter Email Address" name="email">
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-4 col-form-label text-end">Company</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="{{ old('company') }}" name="company" placeholder="Enter Company Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Image</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" name="image" accept="image/*">
                                                @if(count($errors) && old('image')) <span class="text-danger">Upload Image Again</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Attachments</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" name="files[]" multiple>
                                                @if(count($errors) && old('files')) <span class="text-danger">Upload File(s) Again</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end">Address</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="address" id="" cols="30" rows="5">{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-sm-4 col-form-label text-end" name="details">Details</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="details" id="" cols="30" rows="5">{{ old('details') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-3">
                                    <div class="col-lg-3">
                                        <input class="form-control btn btn-purple" type="Submit" value="Create User">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter First Name" value="{{ old('firstname') }}">
                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div> --}}
        </form>
    </div>
@endsection


@section('script')

@endsection
