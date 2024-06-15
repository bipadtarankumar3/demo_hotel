<!-- resources/views/vendor/profile.blade.php -->

@extends('vendor.layouts.main')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Vendor/</span> Profile</h6>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Your Profile Information
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john@example.com</p>
                    <p><strong>Phone:</strong> +1234567890</p>
                    <p><strong>Address:</strong> 123 Main St, City, Country</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Profile Picture
                </div>
                <div class="card-body">
                    <img src="{{URL::to('public/assets/admin/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
