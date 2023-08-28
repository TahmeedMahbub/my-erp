@extends('imports.main.layout')

@section('title', 'Users')

@section('head')
    <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- Page-Title -->

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('user_create')}}" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i> Create User</a>
                </div>
                <h4 class="page-title">All Users</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable_1">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Branch</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="{{asset('assets\images\\'.$user->image)}}" alt="" class="rounded-circle thumb-xs me-1">{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->role->role_name}}</td>
                                        <td>{{$user->branch->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>0{{$user->phone}}</td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('user_view', $user->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('user_edit', $user->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                @if($user->deletable)
                                                    <a href="{{ route('user_delete', $user->id) }}" title="Delete" class="text-secondary-custom">
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
                        </table>
                        <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                        <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                        <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                        <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script src="{{asset('assets/plugins/datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/pages/datatable.init.js')}}"></script>
@endsection
