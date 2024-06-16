@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
    {{ Request::segment(2) . '/' . Request::segment(3) }}

</h6>
<div class="card">
    <h5 class="card-header">User List</h5>
    <div class="card-body">
      <div class="float-right my-2 text-right" style="text-align: right">
        <a href="{{URL::to('admin/user/add-user')}}"><button type="button" class="btn btn-warning">Add</button></a>
     
    </div>

      <div class="table-responsive text-nowrap">
      <table class="table" id="zero_config">
        <thead>
          <tr class="text-nowrap">
            <th>#</th>
            <th>Action</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>gender</th>
            <th>dob</th>
            <th>state</th>
            <th>city</th>
            <th>Address</th>
            <th>DOC id</th>
            <th>DOC Id No</th>
            <th>ID Documents</th>
            <th>Documents</th>
            <th>Remarks</th>
            
           
          </tr>
        </thead>
        <tbody class="table-border-bottom-0" >
          @foreach ($users as $key=> $user)
              
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>
                <a href="{{ URL::to('admin/user/edit_user', $user->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{ URL::to('admin/user/delete_user', $user->id) }}" onclick="deleteConfirmationGet(event)"><i class="fa-solid fa-trash"></i></a>
            </td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->mobile}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->dob}}</td>
            <td>{{$user->state}}</td>
            <td>{{$user->city	}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->doc_id}}</td>
            <td>{{$user->doc_id_no}}</td>
            <td>
              <a href="{{URL::to('/public/')}}{{$user->id_file}}" download="File">File</a>
            </td>
            <td>
              <a href="{{URL::to('/public/'.$user->document)}}" download="Document">Document</a>
            </td>
            <td>{{$user->remarks}}</td>
            
            
          </tr>
          @endforeach


        </tbody>
      </table>
    </div>
    </div>
    
  </div>
</div>
@endsection