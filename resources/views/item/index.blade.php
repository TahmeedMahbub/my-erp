@extends('imports.main.layout')

@section('title', 'Items')

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
                    <a href="{{route('item_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create Item</a>
                </div>
                <h4 class="page-title">All Items</h4>
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
                                    <th>Category</th>
                                    <th>Details</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td><img src="{{ asset('assets\images\\' . $item->image) }}" alt="" class=" thumb-xs me-1"></td>
                                                    <td>
                                                        {{$item->name}}<br>
                                                        @if($item->code) <small><b>Code: </b>{{$item->code}}</small> @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            {{$item->category->name}}
                                        </td>
                                        <td>
                                            {{$item->details}}
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('item_view', $item->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('item_edit', $item->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('item_delete', $item->id) }}" title="Delete" class="text-secondary-custom">
                                                    <i class="mdi mdi-delete-empty pe-2 fs-4"></i>
                                                </a>
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
