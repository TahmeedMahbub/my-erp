@extends('imports.main.layout')

@section('title', 'History')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('branch_create')}}" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i> Create Branch</a>
                </div>
                <h4 class="page-title">Branches</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    @php
        $helpers = new App\Lib\Helpers;
    @endphp
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-centered">
                            <thead class="table-secondary">
                            <tr>
                                <th style="width: 3%;">Sl</th>
                                <th style="width: 7%;">Module</th>
                                <th style="width: 10%;">Operation</th>
                                <th style="width: 30%;">Previous</th>
                                <th style="width: 30%;">After</th>
                                <th style="width: 10%;">Occured By</th>
                                <th style="width: 10%;">User IP Address</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    @php $changes = $helpers->historyChange($history->id); @endphp
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $history->module }} <br>(<small>ID: {{ $history->module_id }}</small>) </td>
                                        <td> {{ $history->operation }}</td>
                                        <td> @php echo $changes["previous"] @endphp </td>
                                        <td> @php echo $changes["after"] @endphp </td>
                                        <td> {{ $history->user->name }}, <small>{{ $history->user->role->role_name }}</small>
                                            <br>(<small>{{ $history->user->email }}</small>)
                                        </td>
                                        <td> {{ $history->ip_address }}</td>
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
