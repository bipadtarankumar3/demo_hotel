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

                        <div class="container">
                            <div id="product-rows ">
                                <!-- Dynamic rows will be appended here -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Date</label>
                                            <input type="date" name="date" id="date" value="{{ isset($order) ? $order->date : '' }}" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Customer </label>
                                            <select name="customer_id" id="customer_id" onchange="getRoomDetails(this.value)" class="form-control">
                                                <option value="">-- Select Customer --</option>
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}" {{ isset($order) && $order->customer_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Room Number</label>
                                            <input type="hidden" name="room_id" id="room_id" value="{{ isset($order) ? $order->room_id : '' }}" class="form-control">
                                            <input type="text" name="room_no" id="room_no" value="{{ isset($order) ? $order->room_no : '' }}" class="form-control">
                                        </div>
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
    
                                    <div class="product_add_more_part">
                                        <div id="dynamic-product-list">
                                            <!-- Initial Product Row -->

                                            @if (isset($order))
                                                @foreach ($items as $key => $orderDetail)
                                                    <div class="row mb-2 product-row">
                                                        <div class="col-md-3">
                                                            <label for="">Product List</label>
                                                            <input type="hidden" name="existing_item_ids[]" value="{{ $orderDetail->id }}">
                                                            <select class="form-control product-select" name="item_id[]" onchange="updateProductDetails(this)">
                                                                <option value="">Select product type</option>
                                                                @foreach ($bottle as $item)
                                                                    <option value="{{ $item->id }}" data-price="{{ $item->price }}" 
                                                                        {{ $orderDetail->item_id == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Price</label>
                                                            <input type="text" class="form-control product-price" name="price[]" value="{{ $orderDetail->price }}" readonly>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="">Quantity</label>
                                                            <input type="number" class="form-control product-quantity" name="count[]" min="1" value="{{ $orderDetail->count }}" onkeyup="updateRowTotal(this)">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="">Total</label>
                                                            <input type="text" class="form-control product-total" name="total[]" value="{{ $orderDetail->total }}" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            @if ($key == 0)
                                                                <button type="button" class="btn btn-success mt-3" onclick="addProductRow()">Add More</button>
                                                            @else
                                                                <button type="button" class="btn btn-danger mt-3" onclick="removeProductRow(this)">Remove</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                                
                                            @else
                                            
                                                <div class="row mb-2 product-row">
                                                    <div class="col-md-3">
                                                        <label for="">Product List</label>
                                                        <select class="form-control product-select" name="item_id[]" onchange="updateProductDetails(this)">
                                                            <option value="">Select product type</option>
                                                            @foreach ($bottle as $item)
                                                                <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Price</label>
                                                        <input type="text" class="form-control product-price" name="price[]" readonly>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="">Quantity</label>
                                                        <input type="number" class="form-control product-quantity" name="count[]" min="1" value="1" onkeyup="updateRowTotal(this)">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="">Total</label>
                                                        <input type="text" class="form-control product-total" name="total[]" readonly>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-success mt-3" onclick="addProductRow()">Add More</button>
                                                    </div>
                                                </div>
                                            @endif
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
        </div>
    </form>
    
</div>

@endsection


@section('js')
    
<script>


    
   
   function getRoomDetails(customerId) {
        if (customerId) {
            $.ajax({
                url: "{{URL::to('admin/order/get-room-details/')}}" +'/'+ customerId,
                type: 'GET',
                success: function(response) {
                    // Assuming the response is a JSON object with room_id and room_no
                    $('#room_id').val(response.room_id);
                    $('#room_no').val(response.room_no);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching room details:', error);
                }
            });
        } else {
            // Clear the hidden fields if no customer is selected
            $('#room_id').val('');
            $('#room_number').val('');
        }
    }

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

    function addProductRow() {
    const productRowTemplate = `
        <div class="row mb-2 product-row">
            <div class="col-md-3">
                <label for="">Product List</label>
                <select class="form-control product-select" name="item_id[]" onchange="updateProductDetails(this)">
                    <option value="">Select product type</option>
                    @foreach ($bottle as $item)
                        <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Price</label>
                <input type="text" class="form-control product-price" name="price[]" readonly>
            </div>
            <div class="col-md-2">
                <label for="">Quantity</label>
                <input type="number" class="form-control product-quantity" name="quantity[]" min="1" value="1" onkeyup="updateRowTotal(this)">
            </div>
            <div class="col-md-2">
                <label for="">Total</label>
                <input type="text" class="form-control product-total" name="total[]" readonly>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger mt-4 remove-product" onclick="removeProductRow(this)">Remove</button>
            </div>
        </div>
    `;
    document.getElementById('dynamic-product-list').insertAdjacentHTML('beforeend', productRowTemplate);
}

function removeProductRow(button) {
    const row = button.closest('.row');
    row.remove();
    calculateSubtotal();
}

function updateProductDetails(select) {
    const selectedOption = select.options[select.selectedIndex];
    const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;

    const row = select.closest('.row');
    const priceField = row.querySelector('.product-price');
    const quantityField = row.querySelector('.product-quantity');
    const totalField = row.querySelector('.product-total');

    priceField.value = price.toFixed(2);
    quantityField.value = 1; // Reset quantity to 1
    totalField.value = price.toFixed(2);

    calculateSubtotal();
}

function updateRowTotal(input) {
    const row = input.closest('.row');
    const price = parseFloat(row.querySelector('.product-price').value) || 0;
    const quantity = parseInt(input.value) || 0;
    const totalField = row.querySelector('.product-total');

    const total = price * quantity;
    totalField.value = total.toFixed(2);

    calculateSubtotal();
}

function calculateSubtotal() {
    const totalFields = document.querySelectorAll('.product-total');
    let subtotal = 0;

    totalFields.forEach(field => {
        subtotal += parseFloat(field.value) || 0;
    });

    document.querySelector('.subtotal_price').value = subtotal.toFixed(2);
    document.getElementById('subtotal').textContent = subtotal.toFixed(2);

    // Grand total can include other charges; for now, it's the same as subtotal
    const grandTotal = subtotal;
    document.querySelector('.grand_total').value = grandTotal.toFixed(2);
    document.getElementById('grand_total').textContent = grandTotal.toFixed(2);
}
    
      
    // function updateTotal(input) {
    //     var row = input.closest('.row');
    //     var price = parseFloat(row.querySelector('.bottle-price')?.value || row.querySelector('.thali-price')?.value);
    //     var quantity = parseInt(row.querySelector('.bottle-quantity')?.value || row.querySelector('.thali-quantity')?.value);
    //     var totalField = row.querySelector('.bottle-total');
        
    //     if (!isNaN(price) && !isNaN(quantity)) {
    //         var total = price * quantity;
    //         if (totalField) {
    //             totalField.value = total.toFixed(2); // Adjust as needed for formatting
    //         }
    //     } else {
    //         if (totalField) {
    //             totalField.value = '';
    //         }
    //     }
        
    //     // Calculate subtotal
    //     calculateSubtotal();
    // }
    
    // function calculateSubtotal() {
    //     var bottleTotal = parseFloat(document.querySelector('.bottle-total').value) || 0;
 
    //     var subtotal = bottleTotal ;
    //     $('.subtotal_price').val(subtotal);
        
        
    //     document.getElementById('subtotal').textContent = subtotal.toFixed(2);
        
    //     // Calculate Grand Total
    //     var grandTotal = subtotal ;
    //     $('.grand_total').val(grandTotal);
    //     document.getElementById('grand_total').textContent = grandTotal.toFixed(2);
    // }
    
    function calculateMinusTwoBottleTotal() {
        var bottlePrice = parseFloat(document.querySelector('.bottle-price').value) || 0;

        // Calculate total after adjustment
        var minusTwoBottleTotal = 2 * bottlePrice;
        
        return minusTwoBottleTotal;
    }

</script>

@endsection