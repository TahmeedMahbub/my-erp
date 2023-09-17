@extends('imports.main.layout')

@section('title', 'Brand Edit')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('brand')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Brands</a>
                </div>
                <h4 class="page-title">Edit Brand</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('brand_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Brand Name </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="name" value="{{$brand->name}}" placeholder="Enter Brand Name (Required)" id="example-text-input" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Brand Category</label>
                                        <div class="col-sm-8">
                                            <select id="default" class="form-select" name="category">
                                                <option class="form-select" value="">Brand Category (Not Mandatory)</option>
                                                @foreach ($categories as $category)
                                                    <option class="form-select" value="{{ $category->id }}" {{$brand->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-month-input" class="col-sm-3 col-form-label text-end"><img src="{{ asset('assets\images\\' . $brand->image) }}" alt="" class="thumb-xs me-1"> Image</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" name="image" accept="image/*">
                                            @if(count($errors) && old('image')) <span class="text-danger">Upload Image Again</span> @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Brand Details</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="details" value="{{$brand->details}}" placeholder="Enter Brand Details (Not Mandatory)" id="example-url-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-lg-3">
                                            <input type="hidden" name="id" value="{{ $brand->id }}">
                                            <input class="form-control btn btn-secondary" type="Submit" value="Edit Brand">
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
