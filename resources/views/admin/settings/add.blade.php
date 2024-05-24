@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
          <h1>Update Information</h1>
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
           
            <form action="{{ route('settings.store') }}" method="post"  enctype="multipart/form-data">

              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label >Company Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('name')}}" name="name"  placeholder="Name">

                </div>

                <div class="form-group">
                  <label>Company Email<span style="color:red">*</span></label>
                  <input type="email" class="form-control" required value="{{ old('company_email') }}" name="company_email" placeholder="Company Email">
                </div>
               
                <div class="form-group">
                  <label>Company Phone<span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('company_phone') }}" name="company_phone" placeholder="Company Phone">
                </div>
  
                <div class="form-group">
                  <label>Company Mobile</label>
                  <input type="text" class="form-control" value="{{ old('company_mobile') }}" name="company_mobile" placeholder="Company Mobile">
                </div>
  
                <div class="form-group">
                  <label>Company Address<span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('company_address') }}" name="company_address" placeholder="Company Address">
                </div>
  
                <div class="form-group">
                  <label>Company City</label>
                  <input type="text" class="form-control" value="{{ old('company_city') }}" name="company_city" placeholder="Company City">
                </div>
  
                <div class="form-group">
                  <label>Company Country</label>
                  <input type="text" class="form-control" value="{{ old('company_country') }}" name="company_country" placeholder="Company Country">
                </div>
  
                <div class="form-group">
                  <label>Company Zipcode</label>
                  <input type="text" class="form-control" value="{{ old('company_zipcode') }}" name="company_zipcode" placeholder="Company Zipcode">
                </div>
  
                <div class="form-group">
                <img src="#" id="image">
                  <label for="exampleInputPassword1">Logo <span style="color:red">*</span></label>
                  <input type="file" accept="image/*" class=" upload" required onchange="readURL(this);"   name="photo">
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