@extends('admin.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>{{ Request::segment(2) . '/' . Request::segment(3) }}</h6>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <h4 class="card-header">
                        {{ isset($bottlethali) ? 'Edit Room Type' : 'Add New Room Type' }}
                    </h4>
                    <div class="card-body">
                        <form action="{{ isset($bottlethali) ? URL::to('admin/bottlethali/update/' . $bottlethali->id) : URL::to('admin/bottlethali/add-action') }}" method="post">
                            @csrf
                            
                            <div class="form-floating form-floating-outline mb-4">
                                <select name="type" class="form-select" id="type" required>
                                    <option value="bottle" {{ old('type', isset($bottlethali) && $bottlethali->type == 'bottle' ? 'selected' : '') }}>bottle</option>
                                    <option value="thali" {{ old('type', isset($bottlethali) && $bottlethali->type == 'thali' ? 'selected' : '') }}>thali</option>
                                </select>
                                <label for="status">Type</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($bottlethali) ? $bottlethali->name : '') }}" required>
                                <label for="name">name</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', isset($bottlethali) ? $bottlethali->price : '') }}" required>
                                <label for="price">price</label>
                            </div>
                        
                            <button class="btn btn-primary mt-2" type="submit">{{ isset($bottlethali) ? 'Update' : 'Add New' }}</button>
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
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($bottlethalis as $key => $bottlethali)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $bottlethali->type }}</td>
                                            <td>{{ $bottlethali->name }}</td>
                                            <td>{{ $bottlethali->price }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/bottlethali/edit', $bottlethali->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ URL::to('admin/bottlethali/delete', $bottlethali->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
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
