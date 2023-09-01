@extends('imports.main.layout')

@section('title', 'Branch')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('branch_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create Branch</a>
                </div>
                <h4 class="page-title">Branches</h4>
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
                                <th>Branch Name</th>
                                <th>Location</th>
                                <th>Details</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $branch->name }} </td>
                                        <td> {{ $branch->location }} </td>
                                        <td>{{ $branch->details }}</td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('branch_view', $branch->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('branch_edit', $branch->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                @if($branch->deletable)
                                                    <a href="{{ route('branch_delete', $branch->id) }}" title="Delete" class="text-secondary-custom">
                                                        <i class="mdi mdi-delete-empty pe-2 fs-4"></i>
                                                    </a>
                                                @else
                                                    <i class="mdi mdi-shield-check-outline pe-2 fs-4" title="Can not Delete"></i>
                                                @endif
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
