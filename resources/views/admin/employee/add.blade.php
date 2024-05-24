@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
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
           
            <form action="{{ route('employee.store') }}" method="post"  enctype="multipart/form-data">

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
               
           
                <div class="form-group">
                  <label >Address <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('address')}}" name="address"  placeholder="address">
                  <div style="color:red">{{$errors->first('address')}}</div>
                </div>
               

                     
                </div>
               

                <div class="form-group">
                <img src="#" id="image">
                  <label for="exampleInputPassword1">Image <span style="color:red">*</span></label>
                  <input type="file" accept="image/*" class=" upload" required onchange="readURL(this);"   name="photo">
                </div>





                <div class="form-group">
                  <label >Salary</label>
                  <input type="text" class="form-control" required value="{{old('salary')}}" name="salary"  placeholder="salary">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
  
          reader.onload = function (e) {
            $('#image').attr('src', e.target.result)
                       .width(80)
                       .height(80);
          };
  
          reader.readAsDataURL(input.files[0]);
        }
      }
  
      // Bind change event to the input
      $('input[type="file"]').change(function() {
        readURL(this);
      });
    });
  </script>
   
  
  @endsection