@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Employee List</h4>
       
       
          
       
            <a href="add" class="btn btn-outline-info btn-icon-text"><i class="icon-printer btn-icon-append"></i>Add New Employee</a>
        
            <br>
            <br>
            <div class="table-responsive">
              @include('sweetalert::alert')
              <table class="table table-striped">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Salary</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value)
              
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->phone}} </td>
                    <td>{{$value->address}} </td>
                    <td>
                      <img src="{{ asset('uploads/photos/'.$value->image) }}" style="width: 100px; height: 100px;">
                  </td>
           
                    <td>{{$value->salary}} </td>
                   
                

                   <td> <a href="edit/{{$value->id}}" class="btn btn-outline-success btn-icon-text"><i class="icon-info btn-icon-prepend"></i>Edit</a>
                    <a href="delete/{{$value->id}}" class="btn btn-outline-danger btn-icon-text">  <i class="icon-cloud-upload  btn-icon-prepend"></i>Delete</a></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <div style="padding: 10px; float: right;">
                {{ $getRecord->appends(request()->except('page'))->links() }}
            </div>
            
                       
                    </div>
                  </div>
                </div>
              </div>
  
    @endsection
  
    @section('script')
    
  
    
    @endsection   