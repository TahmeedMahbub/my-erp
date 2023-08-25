@extends('imports.main.layout')

@section('title', 'Roles')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('roles_create')}}" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i> Create Roles</a>
                </div>
                <h4 class="page-title">User Roles</h4>
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
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Role Name</th>
                                <th>Details</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $role->role_name }}
                                        </td>
                                        <td>{{ $role->details }}</td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('roles_view', $role->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('roles_edit', $role->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                @if($role->deletable)
                                                    <a href="{{ route('roles_delete', $role->id) }}" title="Delete" class="text-secondary-custom">
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
