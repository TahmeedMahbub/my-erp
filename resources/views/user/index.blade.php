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
                    <a href="{{route('user_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create User</a>
                </div>
                <h4 class="page-title">All Users</h4>
            </div>
        </div>
    </div>

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
                                    <th>Designation</th>
                                    <th>Contact</th>
                                    <th>Manager</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td><img src="{{ asset('assets\images\\' . $user->image) }}" alt="" class="rounded-circle thumb-xs me-1"></td>
                                                    <td>
                                                        {{$user->name}}<br>
                                                        <small>{{$user->username}}</small>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            {{$user->role->role_name}},<br>
                                            <small>{{$user->branch->name}} Branch</small>

                                        </td>
                                        <td>
                                            {{$user->email}},<br>
                                            <small><b>Phone: </b>0{{$user->phone}}</small>
                                        </td>
                                        <td class="text-muted">
                                            @if (!empty($user->manager_id))
                                                <table>
                                                    <tr>
                                                        <td><img src="{{ asset('assets\images\\' . $user->manager->image) }}" alt="" class="rounded-circle thumb-xs me-1 img-fluid opacity-50"></td>
                                                        <td>
                                                            {{$user->manager->name}}<br>
                                                            <small>{{ optional($user->managerRole)->role_name }}</small>
                                                        </td>
                                                    </tr>
                                                </table>
                                            @else
                                                <table>
                                                    <tr>
                                                        <td><img src="{{ asset('assets\images\no-person.jpg') }}" alt="" class="rounded-circle thumb-xs me-1 img-fluid opacity-50"></td>
                                                        <td>No Manager</td>
                                                    </tr>
                                                </table>
                                            @endif
                                        </td>
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
                                                        <i class="mdi mdi-delete pe-2 fs-4"></i>
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
