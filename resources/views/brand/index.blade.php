@extends('imports.main.layout')

@section('title', 'Brand')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('brand_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create Brand</a>
                </div>
                <h4 class="page-title">Brand</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-centered">
                            <thead class="table-secondary">
                            <tr>
                                <th>Sl</th>
                                <th>Brand Name</th>
                                <th>Details</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td><img src="{{ asset('assets\images\\' . $brand->image) }}" alt="" class="thumb-xs me-1"></td>
                                                    <td>
                                                        {{$brand->name}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>{{ $brand->details }}</td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('brand_view', $brand->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('brand_edit', $brand->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('brand_delete', $brand->id) }}" title="Delete" class="text-secondary-custom">
                                                    <i class="mdi mdi-delete pe-2 fs-4"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection
