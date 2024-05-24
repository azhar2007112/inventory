@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Product List</h4>
      
     
      <a href="{{url('admin/product/add')}}" class="btn btn-outline-info btn-icon-text"><i class="icon-printer btn-icon-append"></i>Add Product</a>
      <br>
      <br>
      <div class="table-responsive">
        @include('sweetalert::alert')
        <table class="table table-striped">
          <thead>
            <tr>
              <th >#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Photo</th>
              <th>Price</th>
              <th>Created By</th>
              <th>Status</th>
              <th>Created Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getRecord as $value)

    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->title}}</td>
      <td>{{$value->category_id}}</td>

      

      <<td>
        <img src="{{ asset('upload/product/'.$getPhoto->where('product_id',$value->id)->first()->image_name) }}" style="width: 100px; height: 100px;">
      </td>

      <td>{{$value->price}}</td>
     
    
      
      <td>{{$value->created_by_name}} </td>
      <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
      <td>{{date('d-m-y',strtotime($value->created_at))}} </td>

     <td> <a href="edit/{{$value->id}}" class="btn btn-outline-success btn-icon-text"><i class="icon-info btn-icon-prepend"></i>Edit</a>
      <a href="delete/{{$value->id}}" class="btn btn-outline-danger btn-icon-text">  <i class="icon-cloud-upload  btn-icon-prepend"></i>Delete</a></td>
    </tr>
   @endforeach
  </tbody>
</table>
<div style="padding: 10px; float: right;">

</div>
         
      </div>
    </div>
  </div>
</div>

  
  @endsection

  @section('script')
  

  
  @endsection