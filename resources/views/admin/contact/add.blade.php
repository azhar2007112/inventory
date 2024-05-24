@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Add New Contact</h1>
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
                  <label >Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('name')}}" name="name"  placeholder="Name">

                </div>

                <div class="form-group">
                  <label >Phone <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('phone')}}" name="phone"  placeholder="phone">
                  <div style="color:red">{{$errors->first('slug')}}</div>
                </div>
               
           
                     
                </div>
               
                <div class="form-group">
                  <label >Email <span style="color:red">*</span></label>
                  <input type="email" class="form-control" required value="{{old('email')}}" name="email"  placeholder="email">
                </div>

                <div class="form-group">
                  <label >description</label>
                  <input type="text" class="form-control" required value="{{old('description')}}" name="description"  placeholder="description">
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