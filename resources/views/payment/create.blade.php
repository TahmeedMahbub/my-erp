@extends('imports.main.layout')

@section('title', 'Purchase Create')

@section('head')
    <style>
        body #content{
            zoom: 0.8;
        }

    </style>
@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <a href="{{route('purchase')}}" class="btn btn-de-primary btn-sm"><i class="mdi mdi-view-list"></i> All Purchases</a>
                </div>
                <h4 class="page-title">Purchase Create</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <form action="{{ route('purchase_store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 p-2">
                                <label for="">Vendor</label>
                                <select id="vendor" class="form-select" name="vendor" required>
                                    <option value="">Select Vendor</option>
                                    <option value="">Mr ABC (01685412365), CN-4325</option>
                                    <option value="">Mr XYZ (01756845214), CN-6542</option>
                                </select>
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Amount</label>
                                <input class="form-control" type="number" id="amount" min="0" step="0.01" name="amount" placeholder="Amount">
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Paid Through</label>
                                <select id="paid_through" class="form-select" name="paid_through" required>
                                    <option value="">Select Bank Account</option>
                                    <option value="">Mr ABC (01685412365), CN-4325</option>
                                    <option value="">Mr XYZ (01756845214), CN-6542</option>
                                </select>
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Date</label>
                                <input type="date" class="form-control" id="" value="2023-05-22" name="cheque_date" placeholder="">
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Branch Name</label>
                                <select id="branch" class="form-select" name="branch" required>
                                    <option value="">Select Branch</option>
                                    <option value="">Head Office</option>
                                    <option value="">Comilla</option>
                                </select>
                                <!-- <span class="text-danger">{{ $errors->first('branch') }}</span> -->
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Cheque Number</label>
                                <input class="form-control" type="text" id="cheque_no" min="0" step="0.01" name="cheque_no" placeholder="Cheque Number">
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="">Cheque Date</label>
                                <input type="date" class="form-control" id="" value="" name="cheque_date" placeholder="Cheque Date">
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
                                    <tr class="border-bottom">
                                        <th class="p-2" style="width: 10%;">#</th>
                                        <th class="p-2" style="width: 18%;">Purchase Date</th>
                                        <th class="p-2" style="width: 18%;">Purchase No</th>
                                        <th class="p-2 text-end" style="width: 18%;">Total Amount</th>
                                        <th class="p-2 text-end" style="width: 18%;">Due Amount</th>
                                        <th class="p-2 text-end" style="width: 18%;">Paid Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-bottom">
                                        <td scope="row">1</td>
                                        <td class="p-2">19-Sep-2023</td>
                                        <td class="p-2"><a href="purchase.html">Pur-000001</a></td>
                                        <td class="p-2 text-end">15000.00</td>
                                        <td class="p-2 text-end">4000.00</td>
                                        <td class="p-2">
                                            <input class="form-control text-end" type="number" id="paid_amount_0" value="0.00" min="0" step="0.01" name="paid_amounts[]" placeholder="Paid Amount">
                                        </td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td scope="row">2</td>
                                        <td class="p-2">19-Sep-2023</td>
                                        <td class="p-2">Pur-000001</td>
                                        <td class="p-2 text-end">15000.00</td>
                                        <td class="p-2 text-end">4000.00</td>
                                        <td class="p-2">
                                            <input class="form-control text-end" type="number" id="paid_amount_0" value="0.00" min="0" step="0.01" name="paid_amounts[]" placeholder="Paid Amount">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="10" colspan="4"></td>
                                        <td class="p-2 text-end">Paid Amount</td>
                                        <td class="p-2 text-end">545.75 TK</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 text-end">Used Amount</td>
                                        <td class="p-2 text-end">545.75 TK</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 text-end">Excess Amount</td>
                                        <td class="p-2 text-end">545.75 TK</td>
                                    </tr>
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row p-2">
                                    <div class="col-lg-12">
                                        <label for="">Note</label>
                                        <input type="text" class="form-control" name="note" value="" placeholder="Enter Any Optional Note">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-3">
                                <input class="form-control btn btn-purple" type="Submit" value="Create Invoice">
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
        $(document).ready(function() {
            $("#add_item").click(function() {
                var lastItemId = parseInt($(".item_rows:last").attr("id").match(/\d+/));
                var newItemId = lastItemId + 1;

                var newItemRow = `<tr class="border-bottom item_rows" id="item_row_${newItemId}">
                                    <th scope="row">${newItemId + 1}</th>
                                    <td class="p-2 text-center" id="item_img_${newItemId}"><img src="{{ asset('assets/\images/\items/\item.jpg') }}" alt="item" style="height: 40px;"></td>
                                    <td class="p-2">
                                        <select id="item_${newItemId}" class="form-select custom_select" onchange="itemChanged(this);" name="items[]" required>
                                            <option value="" data-item-image="{{ asset('assets/images/items/item.jpg') }}" data-carton-size="0" data-purchase-price="0">Select Item</option>
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}" data-item-image="{{ asset('assets/\images/\\' . $item->image) }}" data-carton-size="{{ $item->carton_size }}" data-purchase-price="{{ $item->purchase_price }}">{{ $item->name }}, {{ $item->code }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('item_${newItemId}') }}</span>
                                    </td>
                                    <td class="p-2">
                                        <input class="form-control" type="date" id="expiry_date_${newItemId}" value="" name="expiry_date[]">
                                        <span class="text-danger">{{ $errors->first('expiry_date_${newItemId}') }}</span>
                                    </td>
                                    <td class="p-2">
                                        <input class="form-control item-data-changed" type="number" id="carton_${newItemId}" value="0" step="0.001" name="carton_qty[]" placeholder="Carton QTY">
                                    </td>
                                    <td class="p-2">
                                        <input class="form-control item-data-changed" type="number" id="base_${newItemId}" value="0" step="0.001" name="base_qty[]" placeholder="Base QTY">
                                        <span class="text-danger">{{ $errors->first('base_${newItemId}') }}</span>
                                    </td>
                                    <td class="p-2">
                                        <div class="input-group">
                                            <input class="form-control item-data-changed" type="number" style="width: 70px;" id="rate_${newItemId}" value="0" step="0.01" name="rates[]" placeholder="Rate Per Unit" required>
                                            <select id="unit_${newItemId}" class="form-select item-data-changed" name="units[]">
                                                <option value="base">Base</option>
                                                <option value="ctn">Ctn</option>
                                            </select>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('rate_${newItemId}') }}</span>
                                    </td>
                                    <td class="p-2">
                                        <div class="input-group">
                                            <input class="form-control item-data-changed" type="number" style="width: 70px;" id="discount_${newItemId}" value="0" step="0.001" name="discounts[]" placeholder="Discount">
                                            <select id="discount_type_${newItemId}" class="form-select item-data-changed" name="discount_types[]">
                                                <option value="tk">TK</option>
                                                <option value="%">%</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="p-2">
                                        <div id="amount_show_${newItemId}" class="text-end item_amounts">0.00</div>
                                    </td>
                                    <td class="p-2">
                                        <div class="text-center"><a title="Remove Item" id="remove_${newItemId}" class="text-secondary-custom remove_items"><i class="mdi mdi-delete pe-2 fs-2"></i></a></div>
                                    </td>
                                </tr>`;
                $(".item_rows:last").after(newItemRow);
                new Selectr("#item_"+newItemId);
            });
        });

        $(document).on("input", ".item-data-changed", function () {
            var inputName = $(this).attr("id").replace(/\d+/g, '');
            var inputId = parseInt($(this).attr('id').match(/\d+/));
            var cartonSize = parseInt($("#item_"+inputId+" option:selected").data('carton-size'));

            if(inputName == "carton_")
            {
                $("#base_"+inputId).val(($("#carton_"+inputId).val() * cartonSize).toFixed(3));
            }
            else if(inputName == "base_")
            {
                $("#carton_"+inputId).val(($("#base_"+inputId).val() / cartonSize).toFixed(3));
            }

            var carton = $("#carton_"+inputId).val();
            var base = $("#base_"+inputId).val();
            var rate = $("#rate_"+inputId).val() ?? 0;
            var unit = $("#unit_"+inputId).val();
            var discount = $("#discount_"+inputId).val();
            var discount_type = $("#discount_type_"+inputId).val();
            var amount = 0;

            if(unit == 'ctn')
            {
                amount = carton * rate - (discount_type == '%' ? carton * rate * discount / 100 : discount );
            }
            else
            {
                amount = base * rate - (discount_type == '%' ? base * rate * discount / 100 : discount );
            }

            $("#amount_show_"+inputId).html(amount.toFixed(2));
            calculate_amounts();
        });

        $(document).on("input", ".data-changed", function () {
            calculate_amounts();
        });

        $(document).on("click", ".remove_items", function () {
            var inputId = parseInt($(this).attr('id').match(/\d+/));
            $("#item_row_"+inputId).empty();
            calculate_amounts();
        });

        function calculate_amounts()
        {
            var subtotal_amount = 0;
            $(".item_amounts").each(function() {
                var amount = parseFloat($(this).text());
                if (!isNaN(amount)) {
                    subtotal_amount += amount;
                }
            });

            var main_discount = $("#main_discount").val() != "" ? parseFloat($("#main_discount").val()) : 0;
                main_discount = $("#main_discount_type").val() == "%" ? subtotal_amount * main_discount / 100 : main_discount;
            var main_vat = $("#main_vat").val() != "" ? parseFloat($("#main_vat").val()) : 0;
                main_vat = $("#main_vat_type").val() == "%" ? (subtotal_amount - main_discount) * main_vat / 100 : main_vat;
            var main_shipping = $("#main_shipping").val() != "" ? parseFloat($("#main_shipping").val()) : 0;
            var paid_amount =  $("#main_payment").val() != "" ? parseFloat($("#main_payment").val()) : 0;
            var total_amount = subtotal_amount - main_discount + main_vat + main_shipping;
            var due_amount = total_amount - paid_amount;
            if(due_amount < 0)
            {
                excess_amount = -1 * due_amount;
                due_amount = 0;
            }
            else
            {
                excess_amount = 0;
            }

            $("#subtotal_show").html(subtotal_amount.toFixed(2));
            $("#subtotal").val(subtotal_amount.toFixed(2));
            $("#main_discount_show").html(main_discount.toFixed(2));
            $("#discount").val(main_discount.toFixed(2));
            $("#main_vat_show").html(main_vat.toFixed(2));
            $("#vat").val(main_vat.toFixed(2));
            $("#main_shipping_show").html(parseFloat(main_shipping).toFixed(2));
            $("#shipping").val(parseFloat(main_shipping).toFixed(2));
            $("#total_amount_show").html(parseFloat(total_amount).toFixed(2));
            $("#total_amount").val(parseFloat(total_amount).toFixed(2));
            $("#total_paid_show").html(parseFloat(paid_amount).toFixed(2));
            $("#due_amount_show").html(parseFloat(due_amount).toFixed(2));
            $("#excess_amount_show").html(parseFloat(excess_amount).toFixed(2));
        }

        function itemChanged(selectElement) {
            var selectId = parseInt($(selectElement).attr('id').match(/\d+/));
            var selectOption = $(selectElement).find('option:selected');
            var itemImage = selectOption.data('item-image');
            var cartonSize = selectOption.data('carton-size');
            var purchasePrice = selectOption.data('purchase-price');
            purchasePrice = typeof purchasePrice == "number" ? purchasePrice : 0;

            $("#item_img_"+selectId).html(`<img src="${itemImage}" alt="item" style="height: 40px;">`);
            $("#carton_"+selectId).val(0);
            $("#base_"+selectId).val(0);
            $("#rate_"+selectId).val(purchasePrice);
            $("#unit_"+selectId).val("base");
            $("#discount_"+selectId).val(0);
            $("#discount_type_"+selectId).val("tk");
            $("#amount_show_"+selectId).html("0.00");
        }

        function oldItemChanged(selectElement) {
            var selectId = parseInt($(selectElement).attr('id').match(/\d+/));
            var selectOption = $(selectElement).find('option:selected');
            var itemImage = selectOption.data('item-image');
            var cartonSize = selectOption.data('carton-size');
            var purchasePrice = selectOption.data('purchase-price');
            purchasePrice = typeof purchasePrice == "number" ? purchasePrice : 0;

            $("#item_img_"+selectId).html(`<img src="${itemImage}" alt="item" style="height: 40px;">`);
            var carton = $("#carton_"+selectId).val();
            var base = $("#base_"+selectId).val();
            var rate = $("#rate_"+selectId).val() ?? 0;
            var unit = $("#unit_"+selectId).val();
            var discount = $("#discount_"+selectId).val();
            var discount_type = $("#discount_type_"+selectId).val();
            var amount = 0;

            if(unit == 'ctn')
            {
                amount = carton * rate - (discount_type == '%' ? carton * rate * discount / 100 : discount );
            }
            else
            {
                amount = base * rate - (discount_type == '%' ? base * rate * discount / 100 : discount );
            }

            $("#amount_show_"+selectId).html(amount.toFixed(2));
            calculate_amounts();
        }
    </script>
@endsection
