@extends('imports.main.layout')

@section('title', 'Payment Made')

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
                    <a href="{{route('payment_create')}}" class="btn btn-purple btn-sm"><i class="mdi mdi-plus"></i> Create Payment Made</a>
                </div>
                <h4 class="page-title">Payment Made</h4>
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
                                <th>Payment Made Code</th>
                                <th>Vendor</th>
                                <th>Branch</th>
                                <th>Purchase Code(s)</th>
                                <th class="text-end">Total Amount</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment_mades as $payment_made)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td>PM-{{ $payment_made->code }} <br> <small>{{ date("d-M-Y", strtotime($payment_made->date)) }}</small> </td>
                                        <td>{{ $payment_made->vendor->name }} <br> <small>Mobile: 0{{ $payment_made->vendor->phone }}</small> </td>
                                        <td>{{ $payment_made->branch->name }} </td>
                                        <td>
                                            @foreach ($payment_made->entries as $entry)
                                                @if (!empty($entry->purchase)) <a href="{{ route('purchase_view', $entry->purchase->id) }}">PUR-{{ $entry->purchase->code }}</a> @endif
                                                @if (!$loop->last), @endif
                                            @endforeach
                                        </td>
                                        <td class="text-end">{{ $payment_made->amount }} BDT</td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('payment_view', $payment_made->id) }}" title="View" class="text-secondary-custom">
                                                    <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                </a>
                                                <a href="{{ route('payment_edit', $payment_made->id) }}" title="Edit" class="text-secondary-custom">
                                                    <i class="mdi mdi-lead-pencil pe-2 fs-4"></i>
                                                </a>
                                                <a href="" title="Delete" class="text-secondary-custom" data-bs-toggle="modal" data-bs-target="#payment_delete_{{$payment_made->id}}">
                                                    <i class="mdi mdi-delete pe-2 fs-4"></i>
                                                </a>

                                                <div class="modal fade" id="payment_delete_{{$payment_made->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLabel" aria-hidden="true">
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
                                                                        <h5 class="text-center">Want to Delete Payment?</h5>
                                                                        <center>
                                                                            <small class="text-muted ml-2">{{ $payment_made->date ? date("d-M-Y", strtotime($payment_made->date)) : "" }}</small>
                                                                        </center>
                                                                        <ul class="mt-3 mb-0 text-left">
                                                                            <b>Puchase Code:</b> PUR-{{ $payment_made->code }} <br>
                                                                            <b>Vendor:</b> {{ $payment_made->vendor->name }} (0{{ $payment_made->vendor->phone }}) <br>
                                                                            <b>Total Amount:</b> {{ $payment_made->amount }} BDT
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                <a href="{{ route('payment_delete', $payment_made->id) }}" type="button" class="btn btn-danger btn-sm">Confirm Delete</a>
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
