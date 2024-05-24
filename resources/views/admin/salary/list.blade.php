@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Salary List</h4>
      
     
      <a href="{{url('admin/salary/add')}}" class="btn btn-outline-info btn-icon-text"><i class="icon-printer btn-icon-append"></i>Pay Salary </a> <span class="pull-right text-danger">{{date("F Y")}}</span> 
      <br>
      <br>
      <div class="table-responsive">
        @include('sweetalert::alert')
        <table class="table table-striped">
          <thead>
            <tr>
              <th >#</th>
              <th>Employee Name</th>
              <th>Photo</th>
              <th>Salary</th>
              <th>Month </th>
             
              <th>Year</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $value)

    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->name}}</td>
    
     
      <td>
        <img src="{{ asset('uploads/photos/'.$value->image) }}" style="width: 100px; height: 100px;">
    </td>
    <td>{{$value->salary}}</td>
      
      <td> <span class="badge badge-success">{{$value->month}} </span> </td>
      <td>{{$value->year}} </td>

      <td>{{ $value->status == 0 ? 'Paid' : 'Unpaid' }}</td>
   

   
    </tr>
   @endforeach
  </tbody>
</table>
{{-- <div style="padding: 10px; float: right;">
  {{!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}}
</div> --}}
         
      </div>
    </div>
  </div>
</div>

  
  @endsection

  @section('script')
  

  
  @endsection