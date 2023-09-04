@extends('imports.main.layout')

@section('title', 'Category Edit')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('contact_category')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Contact Categories</a>
                </div>
                <h4 class="page-title">Edit Contact Category: {{ $category->name }}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('contact_category_update') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end">Category Name <span class="text-danger font-weight-bold">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="category_name" placeholder="Enter Category Name (Required)" value="{{ $category->name }}" id="example-text-input" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Parent Category</label>
                                        <div class="col-sm-9">
                                            <select name="parent_category" class="form-select">
                                                <option value="">Select Parent Category</option>
                                                @foreach ($categories as $p_category)
                                                    <option value="{{ $p_category->id }}" {{ $p_category->id == $category->parent_category_id ? 'selected' : '' }}>{{ $p_category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10">
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label text-end">Category Details</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="category_details" placeholder="Enter Category Details" value="{{ $category->details }}" id="example-url-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="mb-3 row justify-content-end">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <input class="form-control btn btn-secondary" type="submit" value="Edit Category">
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
