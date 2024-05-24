{{-- @extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">


        <div class="col-sm-6">
          <h1>Category List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          
       
            <a href="add" class="btn btn-primary">Add New Category</a>
        
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
              <h3 class="card-title">Category  list</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th>Meta Keywords</th>
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
                    <td>{{$value->name}}</td>
                    <td>{{$value->slug}} </td>
                    <td>{{$value->meta_title}} </td>
                    <td>{{$value->meta_description}} </td>
                    <td>{{$value->meta_keywords}} </td>
                    <td>{{$value->created_by_name}} </td>
                    <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                    <td>{{date('d-m-y',strtotime($value->created_at))}} </td>

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
  

  
  @endsection --}}

  @extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Category List</h4>
      
     
      <a href="{{url('admin/product/add')}}" class="btn btn-outline-info btn-icon-text"><i class="icon-printer btn-icon-append"></i>Add Category</a>
      <br>
      <br>
      <div class="table-responsive">
        @include('sweetalert::alert')
        <table class="table table-sm">
          <thead>
            <tr>
              <th >#</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Meta Title</th>
              <th>Meta Description</th>
              <th>Meta Keywords</th>
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
              <td>{{$value->name}}</td>
              <td>{{$value->slug}} </td>
              <td>{{$value->meta_title}} </td>
              <td>{{$value->meta_description}} </td>
              <td>{{$value->meta_keywords}} </td>
              <td>{{$value->created_by_name}} </td>
              <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
              <td>{{date('d-m-y',strtotime($value->created_at))}} </td>

             <td> <a href="edit/{{$value->id}}" class="btn btn-primary">Edit</a>
              <a href="delete/{{$value->id}}" class="btn btn-danger">Delete</a></td>
            </tr>
           @endforeach
          </tbody>
        </table>

         
      </div>
    </div>
  </div>
</div>

  
  @endsection

  @section('script')
  

  
  @endsection