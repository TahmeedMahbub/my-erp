@extends('imports.main.layout')

@section('title', 'Unit Create')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('unit')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Units</a>
                </div>
                <h4 class="page-title">Create Unit</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('unit_store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end">Unit Name <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="name" placeholder="Enter Unit Name (Required)" id="example-text-input" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Equivalent</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input class="form-control" type="number" placeholder="Enter Equivalent Base Unit" name="base_unit" step="0.001">
                                                <span class="input-group-text" id="basic-addon2">Base Unit(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10">
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label text-end">Unit Details</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="details" placeholder="Enter Unit Details (Not Mandatory)" id="example-url-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-3 row justify-content-end">
                                        <div class="col-sm-10">
                                            <input class="form-control btn btn-purple" type="submit" value="Create Unit">
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
