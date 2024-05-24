@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Edit Category</h1>
        </div>
       
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
           
            <form action="" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label > Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('name' , $getRecord->name)}}" name="name"  placeholder="Category Name">

                </div>

                <div class="form-group">
                  <label >Phone <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('phone', $getRecord->phone)}}" name="phone"  placeholder="phone">
                  <div style="color:red">{{$errors->first('phone')}}</div>
                </div>


                <div class="form-group">
                  <label >Email <span style="color:red">*</span></label>
                  <input type="email" class="form-control" required value="{{old('email', $getRecord->email)}}" name="email"  placeholder="email">
                  <div style="color:red">{{$errors->first('email')}}</div>
                </div>
               
                <div class="form-group">
                  <label >Status <span style="color:red">*</span></label>
                  <select class="form-control" name="status">
                    <option {{(old('status',$getRecord->status)==0)? 'selected' : ''}}  value="0">Active</option>
                    <option {{(old('status',$getRecord->status)==1)? 'selected' : ''}}  value="1">Inactive</option>
                  </select>
                     
                </div>
               
              
                <div class="form-group">
                  <label >description</label>
                  <input type="text" class="form-control" required value="{{old('description',$getRecord->description)}}" name="description"  placeholder="description">
                </div>

              

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

          <!-- general form elements -->

          <!-- /.card -->

        </div>

      </div><!-- /.container-fluid -->
    </section>
  </div>
  
    @endsection
  
    @section('script')
    
  
    
    @endsection