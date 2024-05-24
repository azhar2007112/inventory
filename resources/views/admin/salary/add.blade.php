@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Add New Product</h1>
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
           
            <form action="{{ route('insert.salary') }}" method="post"  enctype="multipart/form-data">

              @csrf
              <div class="card-body">
                <div class="form-group">
              @php
                  $emp=DB::table('employee')->get();
                  @endphp
          <label >Employee Name <span style="color:red">*</span></label>
              <select name="emp_id" class="form-control" id="">
                <option value=""></option>
                @foreach ($emp as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
           

                
<div>
  <div class="form-group">
  <label for="exampleInputPassword12">Month</label>
  <select name="month" class="form-control" id="">
    <option value=""></option>
    <option value="January">January</option>
    <option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
  </select>
</div>
                





                <div class="form-group">
                  <label for="exampleInputPassword20">Salary</label>
                  <input type="text" class="form-control" required  name="salary"  placeholder="salary" required>
                </div>

     
                <div class="form-group">
                  <label for="exampleInputPassword20">Year</label>
                  <input type="text" class="form-control" required  name="year"  placeholder="year" required>
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