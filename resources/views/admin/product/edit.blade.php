@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{url('/assetsh/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Edit Product</h1>
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
           
            <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label >Title<span style="color:red">*</span></label>
      <input type="text" class="form-control" required value="{{old('title',$product->title)}}" name="title"  placeholder="title">

    </div>
   
    </div>


<div class="col-md-6">

  <div class="form-group">
    <label >SKU<span style="color:red">*</span></label>
    <input type="text" class="form-control" required value="{{old('sku',$product->sku)}}" name="sku"  placeholder="SKU">


</div>

</div>

<div class="col-md-6">

  <div class="form-group">
    <label >Category<span style="color:red">*</span></label>
    <select class="form-control" id="ChangeCategory" name="category_id" > <option value="">Select</option>
      @foreach ($getCategory as $category)
      <option {{($product->category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
      
    </select>

</div>

</div>

   

<div class="col-md-6">

  <div class="form-group">
    <label >Sub Category<span style="color:red">*</span></label>
    <select class="form-control" id="getSubCategory" name="sub_category_id" >
      <option value="">Select</option>
      @foreach ($getSubCategory as $subcategory)
      <option {{($product->subcategory_id == $subcategory->id) ? 'selected' : ''}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
      @endforeach
    </select>

</div>

</div>

<div class="col-md-6">

  <div class="form-group">
    <label >Brand<span style="color:red">*</span></label>
    <select class="form-control" name="brand_id" >
      <option value="">Select</option>  @foreach ($getBrand as $brand)
      <option {{($product->brand_id == $brand->id) ? 'selected' : ''}} value="{{$brand->id}}" >{{$brand->name}}</option>
      @endforeach
    </select>

</div>

</div>
</div>

<div class="row">
  <div class="col-md-6">

    <div class="form-group">
      <label >Color<span style="color:red">*</span></label>
@foreach ($getColor as $color)
@php
    $checked = '';

@endphp
@foreach ($product->getcolor as $pcolor)
@if ($pcolor->color_id == $color->id)
@php
$checked = 'checked';

@endphp
@endif

@endforeach
<div>
  <label for=""><input {{$checked}} type="checkbox" name="color_id[]" value="{{$color->id}}">{{$color->name}}</label>
 </div>
 
      @endforeach
    </div>
  </div>
  
</div>



<hr>
<div class="row">
  <div class="col-md-6">

    <div class="form-group">
      <label >Price (Tk) <span style="color:red">*</span></label>
      <input type="text" class="form-control" required value="{{$product->price}}" name="price"  placeholder="Price">
  
    </div>
  </div>
  
  <div class="col-md-6">

    <div class="form-group">
      <label >Old Price (Tk)<span style="color:red">*</span></label>
      <input type="text" class="form-control"   name="old_price"  value="{{$product->old_price}}" placeholder="Old Price">
  
    </div>
  </div>

  

  <div class="row">
   
    
  </div>

  <hr>

</div>

<hr>
<div class="row">
  <div class="col-md-12">

    <div class="form-group">
      <label >Image<span style="color:red">*</span></label>
      <input type="file" name="photo" class="form-control" style="padding: 5px;" >
    </div>
  </div>
</div>
@if (!empty($product->getImage->count()))
    <div class="row" id="sortable">
      @foreach ($product->getImage as $image)
      @if (!empty($image->getLogo()))
      <div class="col-md-1 sortable_image" id="{{$image->id}}" style="text-align:center;">
      <img src=" {{$image->getLogo()}}" style="width:100%;height:200px;" alt=""> 
      <a onclick="return confirm('Are you sure you want to delete');" href="{{url('admin/product/image_delete/'.$image->id)}}" style="margin-top: 10px;" class="btn btn-danger btn-sm">Delete</a>
      </div>
      @endif  
    
      @endforeach
    </div>
@endif
<hr>


<div class="row">
  <div class="col-md-12">

    <div class="form-group">
      <label >Short Description<span style="color:red">*</span></label>
      <textarea class="form-control editor"  name="short_description"  placeholder="Short Description">"{{$product->short_description}}"
      </textarea>
    </div>
  </div>
</div>


<div class="row">
  <div class="form-group">
    <label >Status <span style="color:red">*</span></label>
    <select class="form-control" name="status">
      <option {{($product->status==0)? 'selected' : ''}}  value="0">Active</option>
      <option {{($product->status==1)? 'selected' : ''}}  value="1">Inactive</option>
    </select>
       
  </div>
</div>



              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
  <script src="{{url('/assetsh/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script src="{{url('/sortable/jquery-ui.js')}}"></script>
  {{-- <script src="{{url('/tinymce/tinymce-jquery.min.js')}}"></script> --}}


<script type="text/javascript">
    $(document).ready(function(){
        $("#sortable").sortable({
            update : function(event, ui){
                var photo_id = new Array();
                $('.sortable_image').each(function(){
                    var id= $(this).attr('id');
                    photo_id.push(id);
                });
                $.ajax({
                    type:"POST",
                    url:"{{url('admin/product_image_sortable')}}",
                    data:{
                        "photo_id":photo_id,
                        "_token":"{{csrf_token()}}"
                    },
                    dataType:"json",
                    success:function(data){
                
                    },
                    error:function(data){}
                });
            }
        });

        $('#ChangeCategory').change(function(){
            var id = $(this).val();
            $.ajax({
                type:"POST",
                url:"{{url('/admin/get_sub_category')}}",
                data:{
                    "id": id,
                    "_token":"{{csrf_token()}}"
                },
                dataType:"json",
                success:function(data){
                    $('#getSubCategory').html(data.html);
                },
                error:function(data){
                    console.error(data);
                }
            });
        });
    });
</script>

  
  @endsection