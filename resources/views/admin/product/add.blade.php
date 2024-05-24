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
           
            <form action="{{url('/admin/product/add')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label >Title<span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('title')}}" name="title"  placeholder="title">

                </div>

                <div class="form-group">
                  <label >Title<span style="color:red">*</span></label>
                  <input type="file" class="form-control" required  name="photo"  placeholder="Photo">

                </div>

                <div class="form-group">
                  <label >Price<span style="color:red">*</span></label>
                  <input type="number" class="form-control" required  name="price"  placeholder="Price">

                </div>

                <div class="form-group">
                  <label >Category<span style="color:red">*</span></label>
                  <select name="category" class="form-control">
                   @foreach ($getCat as $item)
                       <option value="{{$item->id}}">
                        {{$item->name}}
                       </option>
                   @endforeach
                  </select>

                </div>

                <div class="form-group">
                  <label >Sub-Category<span style="color:red">*</span></label>
                  <select name="sub_category" class="form-control">
                   @foreach ($getSubCat as $item)
                       <option value="{{$item->id}}">
                        {{$item->name}}
                       </option>
                   @endforeach
                  </select>

                </div>

                <div class="form-group">
                  <label >Color<span style="color:red">*</span></label>
                  <select name="color" class="form-control">
                   @foreach ($getColor as $item)
                       <option value="{{$item->id}}">
                       {{$item->name}}
                       </option>
                   @endforeach
                  </select>

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
        <!-- /.col -->
       
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>

  @endsection

  @section('script')
  

  
  @endsection