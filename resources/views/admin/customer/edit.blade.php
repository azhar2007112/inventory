@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Employee Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- General form elements -->
                    <div class="card card-primary">
                        <form action="{{ route('customer.update', $getRecord->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required value="{{ old('name', $getRecord->name) }}" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Phone <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required value="{{ old('phone', $getRecord->phone) }}" name="phone" placeholder="Phone">
                                    <div style="color:red">{{ $errors->first('phone') }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Address <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required value="{{ old('address', $getRecord->address) }}" name="address" placeholder="Address">
                                    <div style="color:red">{{ $errors->first('address') }}</div>
                                </div>
                                <div class="form-group">
                                    <label >Image<span style="color:red">*</span></label>
                                    <input type="file" name="image[]" class="form-control" style="padding: 5px;" multiple accept="image/*">
                                  </div>
                                <div class="form-group">
                                    <label>Salary <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" required value="{{ old('salary', $getRecord->salary) }}" name="salary" placeholder="Salary">
                                    <div style="color:red">{{ $errors->first('salary') }}</div>
                                </div>
                
                                <div class="form-group">
                                    <label >Shope Name</label>
                                    <input type="text" class="form-control" required  name="shopname"  placeholder="shopname">
                                  </div>
                                  <div class="form-group">
                                    <label >Holder</label>
                                    <input type="text" class="form-control" required  name="account_holder"  placeholder="account holder">
                                  </div>
                                  <div class="form-group">
                                    <label >Account number</label>
                                    <input type="text" class="form-control" required  name="account_number"  placeholder="account Number">
                                  </div>
                                  <div class="form-group">
                                    <label >Bank Name</label>
                                    <input type="text" class="form-control" required  name="bank_name"  placeholder="bank name">
                                  </div>
                                  <div class="form-group">
                                    <label >Bank branch</label>
                                    <input type="text" class="form-control" required  name="bank_branch"  placeholder="bank  branch">
                                  </div>
                                  <div class="form-group">
                                    <label >City</label>
                                    <input type="text" class="form-control" required  name="city"  placeholder="City">
                                  </div>
              
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>

   
@endsection
