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
                        <form action="{{ route('employee.update', $getRecord->id) }}" method="post" enctype="multipart/form-data">
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
                                    <label>Status <span style="color:red">*</span></label>
                                    <select class="form-control" name="status">
                                        <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                                        <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" value="{{ old('description', $getRecord->description) }}" name="description" placeholder="Description">
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
