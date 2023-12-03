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
                    <a href="{{route('sale_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create Sale</a>
                </div>
                <h4 class="page-title">Sale</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-centered">
                            <thead class="table-secondary">
                            <tr>
                                <th>Sl</th>
                                <th>Sale Code</th>
                                <th>Customer</th>
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
                                        <td title="{{ $due_amount <= 0 ? "Paid" : ($due_amount == $purchase->total_amount ? "Unpaid" : "Partially Paid") }}">
                                            <span class="badge bg-{{ $due_amount <= 0 ? "success" : ($due_amount == $purchase->total_amount ? "danger" : "warning") }}" style="line-height: 13px;padding-right: 2px;padding-left: 2px;">&nbsp;</span> PUR-{{ $purchase->code }} <br>
                                            <small>{{ $purchase->date ? date("d-M-Y", strtotime($purchase->date)) : "" }}</small>
                                        </td>
                                        <td>{{ $purchase->vendor->name }} <br> <small>Mobile: 0{{ $purchase->vendor->phone }}</small> </td>
                                        <td>@if($purchase->delivery_preson) {{ $purchase->delivery_preson->name }} <br> <small>Mobile: 0{{ $purchase->vendor->phone }}</small> @endif</td>
                                        <td>{{ $purchase->branch->name }} </td>
                                        <td>{{ $purchase->total_amount }} </td>
                                        <td>{{ $purchase->paid_amount }} </td>
                                        <td>{{ $due_amount <= 0 ? 0 : $due_amount }} </td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('purchase_view', $purchase->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('purchase_edit', $purchase->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                <a href="" title="Delete" class="text-secondary-custom" data-bs-toggle="modal" data-bs-target="#purchase_delete_{{$purchase->id}}">
                                                    <i class="mdi mdi-delete pe-2 fs-4"></i>
                                                </a>

                                                <div class="modal fade" id="purchase_delete_{{$purchase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title m-0" id="exampleModalDefaultLabel">Delete Confirmation</h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-3 text-center align-self-center">
                                                                        <img src="{{asset('assets/images/delete.gif')}}" alt="" class="img-fluid">
                                                                    </div>
                                                                    <div class="col-lg-9 text-start">
                                                                        <h5 class="text-center">Want to Delete Purchase?</h5>
                                                                        <center>
                                                                            <span class="badge bg-soft-{{ $due_amount <= 0 ? "success" : ($due_amount == $purchase->total_amount ? "danger" : "warning") }}">{{ $due_amount <= 0 ? "Paid" : ($due_amount == $purchase->total_amount ? "Unpaid" : "Partially Paid") }}</span>
                                                                            <small class="text-muted ml-2">{{ $purchase->date ? date("d-M-Y", strtotime($purchase->date)) : "" }}</small>
                                                                        </center>
                                                                        <ul class="mt-3 mb-0 text-left">
                                                                            <b>Puchase Code:</b> PUR-{{ $purchase->code }} <br>
                                                                            <b>Vendor:</b> {{ $purchase->vendor->name }} (0{{ $purchase->vendor->phone }}) <br>
                                                                            <b>Total Amount:</b> {{ $purchase->total_amount }} BDT
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                <a href="{{ route('purchase_delete', $purchase->id) }}" type="button" class="btn btn-danger btn-sm">Confirm Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
