@extends('imports.main.layout')

@section('title', 'Payment Edit')

@section('head')
    <style>
        body #content{
            zoom: 0.8;
        }

    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('payment')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Payments</a>
                </div>
                <h4 class="page-title">Payment Edit</h4>
            </div>
        </div>
    </div>

    @php
        $used_amount = 0;
    @endphp


    <form action="{{ route('payment_update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 p-2">
                                <label for="">Vendor <span class="text-danger font-weight-bold">*</span></label>
                                <select id="vendor" class="form-select custom_select" name="vendor" required>
                                    <option value="{{ $payment->vendor_id }}">{{ $payment->vendor->name }} (0{{ $payment->vendor->phone }}), {{ $payment->vendor->code }}</option>
                                </select>
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Payment Amount <span class="text-danger font-weight-bold">*</span></label>
                                <input class="form-control" type="number" id="amount" min="0" step="0.01" name="amount" placeholder="Amount" value="{{ $payment->amount }}">
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Paid Through <span class="text-danger font-weight-bold">*</span></label>
                                <select id="payment_account" class="form-select custom_select" name="payment_account">
                                    @foreach ($payment_accounts as $payment_account)
                                        <option value="{{ $payment_account->id }}" {{ $payment->paid_through_id == $payment_account->id ? "selected" : "" }}>{{ $payment_account->account_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Date <span class="text-danger font-weight-bold">*</span></label>
                                <input type="date" class="form-control" id="" value="{{ $payment->date }}" name="date" placeholder="">
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Branch Name <span class="text-danger font-weight-bold">*</span></label>
                                <select id="branch" class="form-select custom_select" name="branch">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ !empty($payment->branch_id) ? ($payment->branch_id == $branch->id ? "selected" : "") : (Auth::user()->branch_id == $branch->id ? 'selected' : '') }}>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-3 p-2">
                                <label for="">Cheque Number</label>
                                <input class="form-control" type="text" id="cheque_no" min="0" step="0.01" name="cheque_no" placeholder="Cheque Number" value="{{ $payment->cheque_no }}">
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Cheque Date</label>
                                <input type="date" class="form-control" id="" value="" name="cheque_date" placeholder="Cheque Date" value="{{ $payment->cheque_date }}">
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Attachments</label>
                                <input type="file" class="form-control" name="files[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr class="border-bottom" id="payment_title">
                                        <th class="p-2" style="width: 5%;">#</th>
                                        <th class="p-2" style="width: 15%;">Purchase Date</th>
                                        <th class="p-2" style="width: 10%;">Purchase No</th>
                                        <th class="p-2 text-end" style="width: 10%;">Total Amount</th>
                                        <th class="p-2 text-end" style="width: 10%;">Due Amount</th>
                                        <th class="p-2 text-end" style="width: 20%;">Paid Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment_entries as $payment_entry)
                                        @php
                                            $first_loop_index = $loop->iteration;
                                            $used_amount += $payment_entry->amount;
                                        @endphp
                                        <tr class="border-bottom payment_rows" id="payment_row_{{ $first_loop_index }}">
                                            <td scope="row">{{ $first_loop_index }}</td>
                                            <td class="p-2">{{ date('d-M-Y', strtotime($payment_entry->purchase->date)) }}</td>
                                            <td class="p-2"><a href="{{ route('purchase_view', $payment_entry->purchase->id) }}">PUR-{{ $payment_entry->purchase->code }}</a></td>
                                            <td class="p-2 text-end">{{ $payment_entry->purchase->total_amount }}</td>
                                            <td class="p-2 text-end" id="due_amount_{{ $first_loop_index }}">{{ $payment_entry->purchase->total_amount - $payment_entry->purchase->paid_amount + $payment_entry->amount }}</td>
                                            <td class="p-2" align="right">
                                                <input class="form-control text-end paid_amounts" type="number" id="paid_amount_{{ $first_loop_index }}" min="0" step="0.01" name="paid_amounts[]" max="{{ $payment_entry->purchase->total_amount - $payment_entry->purchase->paid_amount + $payment_entry->amount }}" value="{{ $payment_entry->amount }}" placeholder="Paid Amount" style="width: 88%;">
                                                <input type="hidden" id="purchase_id_{{ $first_loop_index }}" name="purchase_ids[]" value="{{ $payment_entry->purchase->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($remaining_payments as $remaining_payment)
                                        @php $second_loop_index = $loop->iteration + $first_loop_index; @endphp
                                        <tr class="border-bottom payment_rows" id="payment_row_{{ $second_loop_index }}">
                                            <td scope="row">{{ $second_loop_index }}</td>
                                            <td class="p-2">{{ date('d-M-Y', strtotime($remaining_payment->date)) }}</td>
                                            <td class="p-2"><a href="{{ route('purchase_view', $remaining_payment->id) }}">PUR-{{ $remaining_payment->code }}</a></td>
                                            <td class="p-2 text-end">{{ $remaining_payment->total_amount }}</td>
                                            <td class="p-2 text-end" id="due_amount_{{ $second_loop_index }}">{{ $remaining_payment->total_amount - $remaining_payment->paid_amount }}</td>
                                            <td class="p-2" align="right">
                                                <input class="form-control text-end paid_amounts" type="number" id="paid_amount_{{ $second_loop_index }}" min="0" step="0.01" name="paid_amounts[]" max="{{ $remaining_payment->total_amount - $remaining_payment->paid_amount }}" value="0" placeholder="Paid Amount" style="width: 88%;">
                                                <input type="hidden" id="purchase_id_{{ $second_loop_index }}" name="purchase_ids[]" value="{{ $payment_entry->purchase->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td rowspan="10" colspan="3"></td>
                                        <td class="p-2 text-end" id="total_amount"></td>
                                        <td class="p-2 text-end" id="total_due"></td>
                                        <td class="p-2 text-end">
                                            <div class="text-start" style="position: absolute;">&emsp;&emsp;&emsp;&emsp;  Used Amount</div>
                                            <span class="p-2 text-end" id="used_amount_show">{{$used_amount}}</span> &ensp; TK
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="p-2 text-end"></td>
                                        <td class="p-2 text-end"></td>
                                        <td class="p-2 text-end">
                                            <div class="text-start" style="position: absolute;">&emsp;&emsp;&emsp;&emsp;  Excess Amount</div>
                                            <span class="p-2 text-end" id="excess_amount_show">{{$payment->excess_amount}}</span> &ensp; TK
                                            <input type="hidden" name="excess_amount" id="hidden_excess_amount" value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 text-end"></td>
                                        <td class="p-2 text-end"></td>
                                        <td class="p-2 text-end">
                                            <div class="text-start" style="position: absolute;">&emsp;&emsp;&emsp;&emsp;  Paid Amount</div>
                                            <span class="p-2 text-end" id="paid_amount_show">{{$payment->amount}}</span> &ensp; TK
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-12 p-2">
                            <label for="">Note</label>
                            <input type="text" class="form-control" name="note" value="" placeholder="Enter Any Optional Note">
                        </div>


                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-3">
                                <input type="hidden" name="id" value="{{ $payment->id }}">
                                <input class="form-control btn btn-secondary" type="Submit" value="Edit Purchase Payment">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).on("change", "#vendor1", function() {
            var vendor = $("#vendor").val();
            var payments = "";
            if(vendor == "")
            {
                payments += `<tr class="border-bottom payment_rows"> <td scope="row" colspan="6" class="p-2 text-center">Select A Vendor First!</td> </tr>`;
                $('.payment_rows').remove();
                $("#payment_title").after(payments);
                $('#amount').val((0).toFixed(2));
            }
            else
            {
                var total_amount = 0;
                var total_due = 0;
                var url = "{{ route('remaining_payments', ':vendor_id') }}";
                url = url.replace(':vendor_id', vendor);

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        $.each(response.remaining_payments, function (index, value) {

                            var purchase_url = "{{ route('purchase_view', ':purchase_id') }}";
                            purchase_url = purchase_url.replace(':purchase_id', value.id);


                            payments += `<tr class="border-bottom payment_rows" id="payment_row_${index}">
                                                <td scope="row">${index + 1}</td>
                                                <td class="p-2">${value.date}</td>
                                                <td class="p-2"><a href="${purchase_url}">PUR-${value.code}</a></td>
                                                <td class="p-2 text-end">${(value.total_amount).toFixed(2)}</td>
                                                <td class="p-2 text-end" id="due_amount_${index}">${(value.total_amount - value.paid_amount).toFixed(2)}</td>
                                                <td class="p-2" align="right">
                                                    <input class="form-control text-end paid_amounts" type="number" id="paid_amount_${index}" value="0.00" min="0" step="0.01" name="paid_amounts[]" max="${value.total_amount - value.paid_amount}" placeholder="Paid Amount" style="width: 88%;">
                                                    <input type="hidden" id="purchase_id_${index}" name="purchase_ids[]" value="${value.id}">
                                                </td>
                                            </tr>`;

                            total_amount += value.total_amount;
                            total_due += value.total_amount - value.paid_amount;
                        });
                        $('.payment_rows').remove();
                        $("#payment_title").after(payments);
                        $('#used_amount_show').html((0).toFixed(2));
                        $('#excess_amount_show').html((0).toFixed(2));
                        $('#hidden_excess_amount').val((0).toFixed(2));
                        $('#paid_amount_show').html((0).toFixed(2));
                        $('#amount').val((0).toFixed(2));
                        $('#total_amount').html("BDT "+(total_amount).toFixed(2));
                        $('#total_due').html("BDT "+(total_due).toFixed(2));
                    }
                });
            }
        });

        $(document).on("input", "#amount", function() {
            var vendor = $("#vendor").val();
            if(vendor == "")
            {
                $('#amount').val('');
                $('#used_amount_show').html((0).toFixed(2));
                $('#excess_amount_show').html((0).toFixed(2));
                $('#hidden_excess_amount').val((0).toFixed(2));
                $('#paid_amount_show').html((0).toFixed(2));
            }
            else
            {
                var amount = parseFloat($('#amount').val()) || 0;
                var usedAmount = 0;

                $(".paid_amounts").each(function() {
                    var paid_amount = parseFloat($(this).val()) || 0;
                    usedAmount += paid_amount;
                });

                $('#used_amount_show').html((usedAmount).toFixed(2));
                $('#excess_amount_show').html((amount - usedAmount).toFixed(2));
                $('#hidden_excess_amount').val((amount - usedAmount).toFixed(2));
                $('#paid_amount_show').html(amount.toFixed(2));
            }
        });


        $(document).on("input", ".paid_amounts", function() {
            var id          = parseInt($(this).attr('id').match(/\d+/));
            var paidAmount  = parseFloat($("#paid_amount_"+id).val());
            var dueAmount   = parseFloat($("#due_amount_"+id).html());
            var amount      = parseFloat($('#amount').val()) || 0;

            var usedAmount = 0;

            if(dueAmount < paidAmount)
            {
                $("#paid_amount_"+id).val((dueAmount).toFixed(2));
            }

            $(".paid_amounts").each(function() {
                var paid_amount = parseFloat($(this).val()) || 0;
                usedAmount += paid_amount;
            });

            var excessAmount = amount - usedAmount;

            if(excessAmount < 0)
            {
                $("#paid_amount_"+id).val((paidAmount + excessAmount).toFixed(2));
                usedAmount = amount;
                excessAmount = 0;
            }


            $('#used_amount_show').html((usedAmount).toFixed(2));
            $('#excess_amount_show').html(excessAmount.toFixed(2));
            $('#hidden_excess_amount').val((excessAmount).toFixed(2));
            $('#paid_amount_show').html(amount.toFixed(2));

        });
    </script>
@endsection
