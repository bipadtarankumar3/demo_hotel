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
                        <div class="row">
                            <div class="col-md-12 " style="text-align: right">
                                <h3>INVOICE</h3>
                            </div>
                        </div>
                       
                        <table style="width:100%">
                            <tbody>
                                <tr>
                                    <td style="text-align: right">
                                        <h2>PODDAR SEVA SADAN</h2>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">
                                    
                                    </td>
                                    <td style="width: 50%;text-align:left">
                                        <h4 style="background-color: aquamarine;padding:10px;">Details</h4>
                                        <p>DATE: 2024-05-24</p>
                                        <p>INVOICE NO: 2024-05-24</p>
                                        <p>CHECK-IN: 2024-05-24</p>
                                        <p>CHECK-OUT: 2024-05-30</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width:100%">
                            <tbody>
                                <tr>
                                    <td style="width: 50%;text-align:center">
                                        <h3 style="background-color: aquamarine;padding:10px;">FORM</h3>
                                       
                                    </td>
                                    <td style="width: 50%;text-align:center">
                                        <h3  style="background-color: aquamarine;padding:10px;"> BILL TO</h3>
                                        
                                        
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="width: 50%;text-align:center"> <p>Hotel PODDAR SEVA SADAN</p></td>
                                    <td  style="width: 50%;text-align:center"><p>Kumar Dipak</p></td>
                                </tr>
                                <tr>
                                    <td  style="width: 50%;text-align:center"></td>
                                    <td  style="width: 50%;text-align:center"><p>kumar@sd.om</p></td>
                                </tr>
                                <tr>
                                    <td  style="width: 50%;text-align:center"></td>
                                    <td  style="width: 50%;text-align:center"><p>1234656789</p></td>
                                </tr>
                                <tr>
                                    <td  style="width: 50%;text-align:center"></td>
                                    <td  style="width: 50%;text-align:center"></td>
                                </tr>
                                <tr>
                                    <td  style="width: 50%;text-align:center"></td>
                                    <td  style="width: 50%;text-align:center"></td>
                                </tr>
                            </tbody>
                        </table>
                       
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
        console.error( error );
        });
    </script>
@endsection
