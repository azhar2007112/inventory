@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Company Settings</h4>
       
       
          
       
            <a href="add" class="btn btn-outline-info btn-icon-text"><i class="icon-printer btn-icon-append"></i> Update Settings</a>
        
            <br>
            <br>
            <div class="table-responsive">
              @include('sweetalert::alert')
              <table class="table table-striped">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>Company Name</th>
                    <th>Image</th>
               
              <th>Company Email</th>
              <th>Company Phone</th>
              <th>Company Mobile</th>
              <th>Company Address</th>
              <th>City</th>
              <th>Country</th>
              <th>Zip Code</th>
              <th>Logo</th>
                 
                  
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value)
              
                  <tr>
                    <td>{{ $setting->id }}</td>
                    <td>{{ $setting->company_name }}</td>
                    <td>
                      <img src="{{ asset('uploads/photos/'.$value->image) }}" style="width: 100px; height: 100px;">
                  </td>
           
                    <td>{{ $setting->company_email }}</td>
                    <td>{{ $setting->company_phone }}</td>
                    <td>{{ $setting->company_mobile }}</td>
                    <td>{{ $setting->company_address }}</td>
                    <td>{{ $setting->company_city }}</td>
                    <td>{{ $setting->company_country }}</td>
                    <td>{{ $setting->company_zipcode }}</td>
      
                   
                  
                   
                

                  
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <div style="padding: 10px; float: right;">
                {{ $getRecord->appends(request()->except('page'))->links() }}
            </div>
            
                       
                    </div>
                  </div>
                </div>
              </div>
  
    @endsection
  
    @section('script')
    
  
    
    @endsection   