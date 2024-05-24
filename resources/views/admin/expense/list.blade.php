@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection
@section('content')
    

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Expense</h4>
      
     
      <a href="{{url('admin/expense/add')}}" class="btn btn-outline-info btn-icon-text"><i class="icon-printer btn-icon-append"></i>New Expense </a> <span class="pull-right text-danger">{{date("F Y")}}</span> 
      <br>
      <br>
      <div class="card-header">
        <form action="{{ url('admin/expense/search') }}" method="GET" class="float-right">
            <div class="input-group">
                <input type="text" name="start_date" id="start_date" class="form-control datepicker" placeholder="Start Date" autocomplete="off">
                <input type="text" name="end_date" id="end_date" class="form-control datepicker" placeholder="End Date" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    
      <div class="table-responsive">
        @include('sweetalert::alert')
        
        <table class="table table-striped">
          <thead>
            <tr>
              <th >#</th>
              <th>Expense details</th>
              <th>Amount</th>
              <th>Date</th>
              
           
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($getRecord as $value)

    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->detail}}</td>
    
     
   
      <td>{{$value->amount}} </td>
      
      <td> <span class="badge badge-success">{{$value->date}} </span> </td>
      

     
      <td> <a href="edit/{{$value->id}}" class="btn btn-outline-success btn-icon-text"><i class="icon-info btn-icon-prepend"></i>Edit</a>
        <a href="delete/{{$value->id}}" class="btn btn-outline-danger btn-icon-text">  <i class="icon-cloud-upload  btn-icon-prepend"></i>Delete</a></td>

   
    </tr>
   @endforeach
  </tbody>
</table>
@if (!empty($searchPerformed))
<div class="card-footer">
    <h3>Total Expenses: {{ number_format($total ?? 0, 2) }}</h3>
</div>
@endif


{{-- <div style="padding: 10px; float: right;">
  {{!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}}
</div> --}}
         
      </div>
    </div>
  </div>
</div>

  
  @endsection

  @section('script')
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
      $('#date').datepicker({
        dateFormat: "yy-mm-dd"
      });
    });
  </script>
  
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script>

  @endsection