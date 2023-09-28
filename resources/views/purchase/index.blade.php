@extends('imports.main.layout')

@section('title', 'Purchase')

@section('head')
    <style>
        body #content{
            zoom: 0.9;
        }

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('purchase_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create Purchase</a>
                </div>
                <h4 class="page-title">Purchase</h4>
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
                                <th>Purchase Code</th>
                                <th>Vendor</th>
                                <th>Delivery Person</th>
                                <th>Branch</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Due Amount</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    @php $due_amount = $purchase->total_amount - $purchase->paid_amount; @endphp
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td title="{{ $due_amount == 0 ? "Paid" : ($due_amount == $purchase->total_amount ? "Unpaid" : "Partially Paid") }}">
                                            <span class="badge bg-{{ $due_amount == 0 ? "success" : ($due_amount == $purchase->total_amount ? "danger" : "warning") }}" style="line-height: 13px;padding-right: 2px;padding-left: 2px;">&nbsp;</span> PUR-{{ $purchase->code }} <br>
                                            <small>{{ date("h:i A, d-M-Y", strtotime($purchase->updated_at)) }}</small>
                                        </td>
                                        <td>{{ $purchase->vendor->name }} <br> <small>Mobile: 0{{ $purchase->vendor->phone }}</small> </td>
                                        <td>@if($purchase->delivery_preson) {{ $purchase->delivery_preson->name }} <br> <small>Mobile: 0{{ $purchase->vendor->phone }}</small> @endif</td>
                                        <td>{{ $purchase->branch->name }} </td>
                                        <td>{{ $purchase->total_amount }} </td>
                                        <td>{{ $purchase->paid_amount }} </td>
                                        <td>{{ $due_amount }} </td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('purchase_view', $purchase->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('purchase_edit', $purchase->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('purchase_delete', $purchase->id) }}" title="Delete" class="text-secondary-custom">
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
