@extends('imports.main.layout')

@section('title', 'Purchase Edit')

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
                <h4 class="page-title">Purchase Edit</h4>
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
                            <div class="col-lg-3">
                                <label for="">Vendor Name</label>
                                <select id="vendor" class="form-select custom_select" name="vendor" required>
                                    <option value="">Select Vendor</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ $purchase->vendor_id == $vendor->id ? "selected" : "" }}>{{ $vendor->name }} (0{{ $vendor->phone }}), {{ $vendor->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Delivery Person</label>
                                <select id="delivery" class="form-select custom_select" name="delivery">
                                    <option value="">Select Delivery</option>
                                    @foreach ($delivery_persons as $delivery_person)
                                        <option value="{{ $delivery_person->id }}" {{ $purchase->delivery_person_id == $delivery_person->id ? "selected" : "" }}>{{ $delivery_person->name }} (0{{ $delivery_person->phone }}), {{ $delivery_person->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Branch Name</label>
                                <select id="branch" class="form-select custom_select" name="branch">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ $purchase->branch_id ? ($purchase->branch_id == $branch->id ? "selected" : "") : (Auth::user()->branch_id == $branch->id ? 'selected' : '') }}>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Date</label>
                                <input type="date" name="purchase_date" class="form-control" id="" value="{{ $purchase->date ?? date("Y-m-d") }}" placeholder="">
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
                            <table class="table-sm mb-0">
                                <thead class="thead-light">
                                    <tr class="border-bottom item_rows">
                                        <th class="p-2" style="width: 2%;">#</th>
                                        <th class="p-2" style="width: 5%;">Image</th>
                                        <th class="p-2" style="width: 23%;">Item / Service</th>
                                        <th class="p-2" style="width: 7%;">Expiry Date</th>
                                        <th class="p-2" style="width: 8%;">Carton Quantity </th>
                                        <th class="p-2" style="width: 10%;">Base Quantity </th>
                                        <th class="p-2" style="width: 13%;">Rate Per Unit</th>
                                        <th class="p-2" style="width: 12%;">Discount</th>
                                        <th class="p-2" style="width: 5%;">Amount</th>
                                        <th class="p-2 text-center" style="width: 2%;"><a title="Add Item" class="text-secondary-custom" id="add_item"><i class="mdi mdi-plus-box pe-2 fs-2"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($purchase_entries)
                                        @foreach ($purchase_entries as $key => $purchase_entry)
                                            <tr class="border-bottom item_rows" id="item_row_{{ $key }}">
                                                <th scope="row">{{ $key+1 }}</th>
                                                <td class="p-2 text-center" id="item_img_{{ $key }}"><img src="{{ asset('assets/images/items/item.jpg') }}" alt="item" style="height: 40px;"></td>
                                                <td class="p-2">
                                                    <select id="item_{{ $key }}" class="form-select custom_select" onchange="oldItemChanged(this);" name="items[]" required>
                                                    <option value="" data-item-image="{{ asset('assets/images/items/item.jpg') }}" data-carton-size="0" data-purchase-price="0">Select Item</option>
                                                        @foreach ($items as $item)
                                                            <option value="{{ $item->id }}" {{ $purchase_entry->item_id == $item->id ? "selected" : "" }} data-item-image="{{ asset('assets\images\\' . $item->image) }}" data-carton-size="{{ $item->carton_size }}" data-purchase-price="{{ $item->purchase_price }}">{{ $item->name }}, {{ $item->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="p-2">
                                                    <input class="form-control" type="date" id="expiry_date_{{ $key }}" value="{{ $purchase_entry->expiry_date ?? null }}" name="expiry_date[]">
                                                </td>
                                                <td class="p-2">
                                                    <input class="form-control item-data-changed" type="number" id="carton_{{ $key }}" value="{{ $purchase_entry->carton_qty ?? 0 }}" step="0.001" name="carton_qty[]" placeholder="Carton QTY">
                                                </td>
                                                <td class="p-2">
                                                    <input class="form-control item-data-changed" type="number" id="base_{{ $key }}" value="{{ $purchase_entry->base_qty ?? 0 }}" step="0.001" name="base_qty[]" placeholder="Base QTY">
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control item-data-changed" type="number" style="width: 70px;" id="rate_{{ $key }}" value="{{ $purchase_entry->price ?? 0 }}" step="0.01" name="rates[]" placeholder="Rate Per Unit" required>
                                                        <select id="unit_{{ $key }}" class="form-select item-data-changed" name="units[]">
                                                            <option value="base" {{ $purchase_entry->price_unit == "base" ? "selected" : "" }}>Base</option>
                                                            <option value="ctn" {{ $purchase_entry->price_unit == "ctn" ? "selected" : "" }}>Ctn</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control item-data-changed" type="number" style="width: 70px;" id="discount_{{ $key }}" value="{{ $purchase_entry->discount ?? 0 }}" step="0.001" name="discounts[]" placeholder="Discount">
                                                        <select id="discount_type_{{ $key }}" class="form-select item-data-changed" name="discount_types[]">
                                                            <option value="tk" {{ $purchase_entry->discount_type == "tk" ? "selected" : "" }}>TK</option>
                                                            <option value="%" {{ $purchase_entry->discount_type == "%" ? "selected" : "" }}>%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div id="amount_show_{{ $key }}" class="text-end item_amounts">0.00</div>
                                                </td>
                                                <td class="p-2">
                                                    <div class="text-center"><a title="Remove Item" id="remove_{{ $key }}" class="text-secondary-custom remove_items"><i class="mdi mdi-delete pe-2 fs-2"></i></a></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr id="amount_row">
                                        <td colspan="5" rowspan="7" class="align-top {{ !empty($purchase->files) ? 'bg-light' : '' }}">
                                            @if (!empty($purchase->files))
                                                <h4 class="page-title">Attachments</h4>
                                                @foreach (json_decode($purchase->files) as $file)
                                                    @if(@getimagesize(public_path('assets/files/' . $file)))
                                                        <img src="{{ asset('assets/files/' . $file) }}" title="{{ basename($file) }}" class="img-thumbnail" alt="" style="height:150px; margin:5px;">
                                                    @else
                                                        <a href="{{ asset('assets/files/' . $file) }}" title="{{ basename($file) }}"><img src="{{ asset('assets/files/file.jpg') }}" class="img-thumbnail" alt="" style="height:150px; margin:5px;"></a>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-end">Sub Total <span class="text-muted">(+)</span></td>
                                        <td colspan="2"></td>
                                        <td class="p-2 text-end" id="subtotal_show">0.00</td>
                                        <td>TK</td>
                                        <input type="hidden" name="subtotal" id="subtotal" value="0">
                                    </tr>
                                    <tr>
                                        <td class="text-end">Discount <span class="text-muted">(-)</span></td>
                                        <td colspan="2" class="text-center">
                                            <div class="input-group" style="width: 290px;">&emsp;&emsp;
                                                <input class="form-control data-changed" type="number" id="main_discount" value="{{ $purchase->discount ?? 0.00 }}" step="0.01" name="main_discount" placeholder="Discount">
                                                <select id="main_discount_type" class="form-select data-changed" name="main_discount_type" style="width: 30px;">
                                                    <option value="tk" {{ $purchase->discount_type == "tk" ? "selected" : "" }}>TK</option>
                                                    <option value="%" {{ $purchase->discount_type == "%" ? "selected" : "" }}>%</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="p-2 text-end" id="main_discount_show">0.00</td>
                                        <td>TK</td>
                                        <input type="hidden" name="discount" id="discount" value="{{ $purchase->discount ?? 0.00 }}">
                                    </tr>
                                    <tr>
                                        <td class="text-end">Vat / Tax <span class="text-muted">(+)</span></td>
                                        <td colspan="2" class="text-center">
                                            <div class="input-group" style="width: 290px;">&emsp;&emsp;
                                                <input class="form-control data-changed" type="number" id="main_vat" value="{{ $purchase->vat ?? 0.00 }}" step="0.01" name="main_vat" placeholder="VAT / Tax">
                                                <select id="main_vat_type" class="form-select data-changed" name="main_vat_type" style="width: 30px;">
                                                    <option value="%" {{ $purchase->vat_type == "%" ? "selected" : "" }}>%</option>
                                                    <option value="tk" {{ $purchase->vat_type == "tk" ? "selected" : "" }}>TK</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="p-2 text-end" id="main_vat_show">0.00</td>
                                        <td>TK</td>
                                        <input type="hidden" name="vat" id="vat" value="{{ $purchase->vat ?? 0.00 }}">
                                    </tr>
                                    <tr>
                                        <td class="text-end border-bottom">Shipping Charge <span class="text-muted">(+)</span></td>
                                        <td colspan="2" class="text-end border-bottom">
                                            <div class="input-group" style="width: 290px;">&emsp;&emsp;
                                                <input class="form-control data-changed" type="number" id="main_shipping" value="{{ $purchase->shipping_charge ?? 0.00 }}" step="0.01" name="main_shipping" placeholder="shipping">
                                                <select id="main_shipping_type" class="form-select data-changed" name="main_shipping_type" style="width: 30px;">
                                                    <option value="tk">TK</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="p-2 text-end border-bottom" id="main_shipping_show">0.00</td>
                                        <td class="border-bottom">TK</td>
                                        <input type="hidden" name="shipping" id="shipping" value="{{ $purchase->shipping ?? 0.00 }}">
                                    </tr>
                                    <tr>
                                        <td class="text-end fw-bold">Total Amount <span class="text-muted">(+)</span></td>
                                        <td colspan="2"></td>
                                        <td class="p-2 text-end fw-bold" id="total_amount_show">0.00</td>
                                        <td class="fw-bold">TK</td>
                                        <input type="hidden" name="total_amount" id="total_amount" value="0.00">
                                    </tr>
                                    <tr>
                                        <td class="text-end border-bottom fw-bold">Paid Amount <span class="text-muted">(-)</span></td>
                                        <td colspan="2" class="text-end border-bottom"></td>
                                        <td class="p-2 text-end border-bottom fw-bold" id="total_paid_show">0.00</td>
                                        <td class="border-bottom fw-bold">TK</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end fw-bold">Due Amount <span class="text-muted">(+)</span></td>
                                        <td colspan="2"></td>
                                        <td class="p-2 text-end fw-bold" id="due_amount_show">0.00</td>
                                        <td class="fw-bold">TK</td>
                                    </tr>
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row p-2">
                                    <div class="col-lg-9">
                                        <label for="">Note</label>
                                        <input type="text" class="form-control" name="note" value="{{ $purchase->note ?? null }}" placeholder="Enter Any Optional Note">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Attachments</label>
                                        <input type="file" class="form-control" name="files[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-4">
                            <div class="col-lg-3">
                                <input class="form-control btn btn-purple" type="Submit" value="Purchase Items">
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
            var paid_amount =  parseFloat({!! $purchase->paid_amount !!});
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
