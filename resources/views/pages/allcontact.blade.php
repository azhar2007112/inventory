@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">


        <div class="col-sm-6">
          <h1>Ccontact List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          
       
            <a href="add" class="btn btn-primary">Add New Ccontact</a>
        
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
  @include('sweetalert::alert')

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ccontact  list</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($value as $value)
              
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->phone}} </td>
                    <td>{{$value->email}} </td>
                    <td>{{$value->description}} </td>
                

                   <td> <a href="edit/{{$value->id}}" class="btn btn-primary">Edit</a>
                    <a href="delete/{{$value->id}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  
    @endsection
  
    @section('script')
    
  
    
    @endsection   