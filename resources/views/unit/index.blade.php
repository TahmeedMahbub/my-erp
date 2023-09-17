@extends('imports.main.layout')

@section('title', 'Unit')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('unit_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create Unit</a>
                </div>
                <h4 class="page-title">Unit</h4>
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
                                <th>Unit Name</th>
                                <th>Equivalent</th>
                                <th>Details</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $unit->name }} </td>
                                        <td>
                                            @if(!empty($unit->base_unit) && $unit->base_unit == 1)
                                                {{ $unit->base_unit }} Base Unit
                                            @elseif(!empty($unit->base_unit))
                                                {{ $unit->base_unit }} Base Units
                                            @endif
                                        </td>
                                        <td>{{ $unit->details }}</td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('unit_view', $unit->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                @if($unit->id != 1)
                                                    <a href="{{ route('unit_edit', $unit->id) }}" title="Edit" class="text-secondary-custom">
                                                        <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                    </a>
                                                    <a href="{{ route('unit_delete', $unit->id) }}" title="Delete" class="text-secondary-custom">
                                                        <i class="mdi mdi-delete-empty pe-2 fs-4"></i>
                                                    </a>
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
