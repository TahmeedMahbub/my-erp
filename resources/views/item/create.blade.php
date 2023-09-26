@extends('imports.main.layout')

@section('title', 'Item Create')

{{-- @section('head') @endsection --}}

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('item')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Item List</a>
                </div>
                <h4 class="page-title">Create Item</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('item_store') }}" id="item_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Item Name</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="name" placeholder="Enter Item Name" value="{{ old('name') }}" required>
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-url-input" class="col-sm-4 col-form-label text-end">Item Code</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" value="{{ old('code') }}" placeholder="Enter Unique Item Code" name="code">
                                            <span class="text-danger">{{ $errors->first('code') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Category</label>
                                        <div class="col-sm-8">
                                            <select name="category" id="" class="form-control custom_select">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-sm-4 col-form-label text-end"><span class="text-danger font-weight-bold">*</span> Unit</label>
                                        <div class="col-sm-8">
                                            <select name="unit" id="" class="form-control custom_select">
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('unit') }}</span>
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
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end">Brand</label>
                                        <div class="col-sm-8">
                                            <select name="brand" id="" class="form-control custom_select">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('brand') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-tel-input" class="col-sm-4 col-form-label text-end">Carton Size</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" value="{{ old('carton_size') }}" placeholder="Enter Items Per Carton" name="carton_size" min="1" step="0.001">
                                            <span class="text-danger">{{ $errors->first('carton_size') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end">Low Stock</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" value="{{ old('low_stock') }}" name="low_stock" placeholder="Enter Alert for Stock Refill" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-tel-input" class="col-sm-4 col-form-label text-end">Purchase Price</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" value="{{ old('purchase_price') }}" placeholder="Enter Purchase Price" name="purchase_price">
                                            <span class="text-danger">{{ $errors->first('carton_size') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-end">Selling Price</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" value="{{ old('selling_price') }}" placeholder="Enter Selling Price" name="selling_price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 row">
                                        <label for="example-month-input" class="col-sm-2 col-form-label text-end" name="details">Details</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="details" id="" cols="30" rows="5" placeholder="Item Details (Not Required)">{{ old('details') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">
                                <div class="col-lg-3">
                                    <input class="form-control btn btn-purple" type="Submit" value="Create Item">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
