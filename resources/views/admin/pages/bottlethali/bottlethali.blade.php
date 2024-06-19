@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>{{ Request::segment(2) . '/' . Request::segment(3) }}</h6>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <h4 class="card-header">
                        {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
                    </h4>
                    <div class="card-body">
                        <form action="{{ isset($product) ? URL::to('admin/products/update/' . $product->id) : URL::to('admin/products/add-action') }}" method="post">
                            @csrf
                            
                            
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($product) ? $product->name : '') }}" required>
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', isset($product) ? $product->price : '') }}" required>
                                <label for="price">Price</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', isset($product) ? $product->quantity : '') }}" required>
                                <label for="quantity">Quantity</label>
                            </div>
                        
                            <button class="btn btn-primary mt-2" type="submit">{{ isset($product) ? 'Update' : 'Add New' }}</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/products/edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('admin/products/delete', $product->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
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
    </div>
@endsection
