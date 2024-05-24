@extends('layouts.app')
@section('style')
@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Expense</h1>
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
           
            <form action="{{ route('insert.expense') }}" method="post"  enctype="multipart/form-data">

              @csrf
              <div class="card-body">
                <div class="form-group">
             
          <label >Details <span style="color:red">*</span></label>
            <input type="text" name="detail" id="" class="form-control">
           

                
<div>
    


<div class="form-group">
  
  <label for="exampleInputPassword20">amount</label>
                  <input type="text" name="amount" id="amount" class="form-control" required>

 
</div>




                <div class="form-group">
                  <label for="exampleInputPassword20">date</label>
                  <input type="text" name="date" id="date" class="form-control" required>

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
  
  @section('script')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(document).ready(function(){
      $('#date').datepicker({
          dateFormat: 'yy-mm-dd'
      });
  });
  </script>
  @endsection
  
  
  @endsection