@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <form action="{{ isset($order) ? url('admin/order/update/' . $order->id) : url('admin/order/submit-order') }}" method="POST" enctype="multipart/form-data" class="browser-default-validation">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">{{ isset($order) ? 'Edit order' : 'Add order' }}</h5>
                    <div class="card-body">

                      

                        <div id="product-rows">
                            <!-- Dynamic rows will be appended here -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Date</label>
                                        <input type="date" name="date" id="date" value="{{ isset($order) ? $order->date : '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Customer </label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <option value="">-- Select Customer --</option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}" {{ isset($order) && $order->customer_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="row mb-2">
                                
                                <div class="col-md-3">
                                    <label for="">Product List</label>
                                    <select class="form-control product-select" name="item_id" onchange="get_products(this)" data-type="bottle">
                                        <option value="">Select product type</option>
                                        @foreach ($bottle as $item)
                                            <option value="{{$item->id}}" {{ isset($order) && $order->item_id == $item->id? 'selected' : '' }} data-price="{{$item->price}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Price</label>
                                    <input type="text" value="{{ isset($order) ? $order->price : '' }}" class="form-control bottle-price" name="price" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Quantity</label>
                                    <input type="number" value="{{ isset($order) ? $order->quantity : '' }}" class="form-control bottle-quantity" name="quantity" min="1" onkeyup="updateTotal(this)">
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="">Total</label>
                                    <input type="text" value="{{ isset($order) ? $order->total : '' }}" class="form-control bottle-total" name="total" readonly>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-right"  style="text-align: right">
                                <input type="hidden" value="{{ isset($order) ? $order->sub_total : '' }}"  class="form-control subtotal_price" name="sub_total">
                                <h5>Subtotal: ₹<span id="subtotal">{{ isset($order) ? $order->sub_total : '0.00' }}</span></h5>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-12 text-right" style="text-align: right">
                                <input type="hidden" value="{{ isset($order) ? $order->grand_total : '' }}"  class="form-control grand_total" name="grand_total">
                                <h5>Grand total: ₹<span id="grand_total">{{ isset($order) ? $order->grand_total : '0.00' }}</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary mt-2" type="submit">{{ isset($order) ? 'Update' : 'Add New' }}</button>
                                <a href="{{ URL::to('admin/order/list') }}">
                                    <button class="btn btn-success mt-2" type="button">Back</button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>

@endsection


@section('js')
    
<script>
   

   function get_products(select) {
        var selectedOption = select.options[select.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        var type = select.getAttribute('data-type');
        var priceField, quantityField, totalField;
        
        priceField = select.closest('.row').querySelector('.bottle-price');
        quantityField = select.closest('.row').querySelector('.bottle-quantity');
        totalField = select.closest('.row').querySelector('.bottle-total');
        
        if (priceField) {
            priceField.value = price;
        }
        
        updateTotal(quantityField);
    }
    
      
    function updateTotal(input) {
        var row = input.closest('.row');
        var price = parseFloat(row.querySelector('.bottle-price')?.value || row.querySelector('.thali-price')?.value);
        var quantity = parseInt(row.querySelector('.bottle-quantity')?.value || row.querySelector('.thali-quantity')?.value);
        var totalField = row.querySelector('.bottle-total');
        
        if (!isNaN(price) && !isNaN(quantity)) {
            var total = price * quantity;
            if (totalField) {
                totalField.value = total.toFixed(2); // Adjust as needed for formatting
            }
        } else {
            if (totalField) {
                totalField.value = '';
            }
        }
        
        // Calculate subtotal
        calculateSubtotal();
    }
    
    function calculateSubtotal() {
        var bottleTotal = parseFloat(document.querySelector('.bottle-total').value) || 0;
 
        var subtotal = bottleTotal ;
        $('.subtotal_price').val(subtotal);
        
        
        document.getElementById('subtotal').textContent = subtotal.toFixed(2);
        
        // Calculate Grand Total
        var grandTotal = subtotal ;
        $('.grand_total').val(grandTotal);
        document.getElementById('grand_total').textContent = grandTotal.toFixed(2);
    }
    
    function calculateMinusTwoBottleTotal() {
        var bottlePrice = parseFloat(document.querySelector('.bottle-price').value) || 0;

        // Calculate total after adjustment
        var minusTwoBottleTotal = 2 * bottlePrice;
        
        return minusTwoBottleTotal;
    }

</script>

@endsection