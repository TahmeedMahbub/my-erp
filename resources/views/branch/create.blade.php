@extends('imports.main.layout')

@section('title', 'Branch Create')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('branch')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Branches</a>
                </div>
                <h4 class="page-title">Create Branch</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('branch_store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Branch Name <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="branch_name" placeholder="Enter Branch Name (Required)" id="example-text-input" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Branch Location</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="branch_location" placeholder="Enter Branch Location" id="example-text-input" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">Branch Details</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="branch_details" placeholder="Enter Branch Details" id="example-url-input" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3 row justify-content-end">
                                        <div class="col-sm-10">
                                            <input class="form-control btn btn-success" type="submit" value="Create Branch">
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
