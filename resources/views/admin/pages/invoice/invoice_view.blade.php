@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
            {{ Request::segment(2) . '/' . Request::segment(3) }}

        </h6>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Invoice</h5>
                    <div class="card-body">

                        {{-- <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <option value="">-- Select Customer --</option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}" {{ isset($booking) && $booking->customer_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="basic-default-name">Customer</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <input type="date" class="form-control">
                                        <label for="basic-default-name">Date</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" style="margin-top: 0px">Search</button>
                                </div>
                            </div>
                        </form> --}}
                        

                        <div id="invoice mt-4">

                            

                            <div class="invoice overflow-auto" id="invoice_part">
                                <div style="height:50px"></div>
                                <div class="row" style="width: 100%;">
                                    <div class="col-md-2" style="width: 20%">

                                        {{-- <img src="" alt="PODDAR SEVA SADAN"> --}}
                                        <p style="padding: 0px;margin:0px;">PODDAR SEVA SADAN</p>
                                    </div>
                                    <div class="col-md-10" style="width: 79%">
                                        
                                        <p style="padding: 0px;margin:0px;">Address : <span><small>
                                            Sikar- Laxmangarh By Pass Road 
                                        Near Anjani Mata Mandir
                                        Salasar (Rajasthan)</small></span>
                                        </p>
                                        <p style="padding: 0px;margin:0px;">Pin Code : 331506</p>
                                        <p style="padding: 0px;margin:0px;">Mob  : 9672999509</p>
                                        <p style="padding: 0px;margin:0px;">  : 9836599969</p>
                                        <p style="padding: 0px;margin:0px;">Registration No  : DIT (E)/462</p>
                                        <p style="padding: 0px;margin:0px;">   8E/841/07-08</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 " >
                                        <h2>INVOICE</h2>
                                    </div>
                                </div>
                            
                                <table style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50%">
                                                <h4 >BILL TO</h4>
                                                <p style="padding: 0px; margin: 0px;">NAME: {{ $customer->name ?? '' }}</p>
                                                <p style="padding: 0px; margin: 0px;">EMAIL: {{ $customer->email ?? '' }}</p>
                                                <p style="padding: 0px; margin: 0px;">MOBILE NO: {{ $customer->mobile ?? '' }}</p>
                                                <p style="padding: 0px; margin: 0px;">ADDRESS: {{ $customer->address ?? '' }}</p>

                                            </td>
                                            <td style="width: 50%;text-align:right">
                                             
                                                <p  style="padding: 0px;margin:0px;">DATE: {{ $booking->created_at ?? '' }}</p>
                                                {{-- <p  style="padding: 0px;margin:0px;">INVOICE NO: {{ $booking->address ?? '' }}</p> --}}
                                                <p  style="padding: 0px;margin:0px;">CHECK-IN: {{ $booking->checkin_date ?? '' }}</p>
                                                <p  style="padding: 0px;margin:0px;">CHECK-OUT: {{ $booking->checkout_date ?? '' }}</p>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                @php
                                    
                                @endphp
                                <table style="margin-top: 30px;">
                                    <tbody>
                                        <tr>
                                            <td><h3>Hotel Booking Details</h3></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="width:100%" class="table">
                                    <thead>
                                        <tr  style="background-color: #484a49;color:white;padding:10px;">
                                            <th  style="padding: 10px;color:white;">Hotel Type</th>
                                            <th  style="padding: 10px;color:white;">Room No</th>
                                            <th  style="padding: 10px;color:white;">From Date</th>
                                            <th  style="padding: 10px;color:white;">To Date</th>
                                            <th  style="padding: 10px;color:white;text-align:right">Total Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="">{{$booking->type??''}}</td>
                                            <td style="">{{$booking->room_name??''}}</td>
                                            <td style="">{{$booking->checkin_date??''}}</td>
                                            <td style="">{{$booking->checkout_date??''}}</td>
                                            <td style="text-align: end">{{$booking->price??''}}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table>
                                    <tbody>
                                        <tr>
                                            <td><h3>Product Details</h3></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="width:100%"  class="table">
                                    <thead>
                                        <tr  style="background-color: #484a49;color:white;padding:10px;">
                                            <td style="padding: 10px;color:white;">Product Name</td>
                                            <td style="padding: 10px;color:white;">Quantity</td>
                                            <td style="padding: 10px;color:white;">Rate</td>
                                            <td style="padding: 10px;color:white;;text-align:right;">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $product_total = 0;
                                        @endphp
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td style="">{{$item->name}}</td>
                                                <td style="">{{$item->quantity}}</td>
                                                <td style="">{{$item->price}}</td>
                                                <td style="text-align: end">
                                                    {{$item->total}}
                                                    @php
                                                        $product_total +=$item->total;
                                                    @endphp
                                                </td>
                                            </tr>
                                        @endforeach
                                        


                                        <tr style="border-top:1px solid black">
                                            <td colspan="3" style="text-align: right">Sub Total: </td>
                                            <td style="text-align: end">
                                                @php
                                                    $sub_total = $product_total+$booking->price??0 ;
                                                @endphp
                                                {{$sub_total }}
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="3" style="text-align: right">GST (18%): </td>
                                            <td style="text-align: end">
                                                @php
                                                    
                                                    $gst_value = $sub_total * 0.18;
                                                   
                                                @endphp
                                                {{$gst_value}}
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td colspan="3" style="text-align: right">Grand Total: </td>
                                            <td style="text-align: end">
                                                @php
                                                    //  $gst_total = $sub_total + $gst_value;
                                                     $gst_total = $sub_total;
                                                @endphp
                                                {{ $gst_total}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <table  style="width:100%">
                                    <tbody>
                                        <tr style="text-align: center">
                                            <td>
                                                <hr>
                                                PODDAR SEVA SADAN
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="toolbar hidden-print mt-4" style="text-align: right">
                                <div class="button-box">
                                    <a href="{{URL::to('admin/invoice/list')}}" class="btn btn-warning">Back</a>
                                    <button id="printInvoice" class="btn btn-info"  onclick="printdiv('invoice_part')"><i class="fa fa-print"></i> Print</button>
                                </div>
                                <hr>
                            </div>  

                        </div>

                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
    <script>
    
    </script>
@endsection


@section('js')
    <script>

        function printdiv(printpage)
    {
      var headstr = "<html><head><title></title></head><body>";
      var footstr = "</body>";
      var newstr = document.all.item(printpage).innerHTML;
      var oldstr = document.body.innerHTML;
      document.body.innerHTML = headstr+newstr+footstr;
      window.print();
      document.body.innerHTML = oldstr;
      return false;
    }
    </script>
@endsection
