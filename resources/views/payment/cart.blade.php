@extends('layouts.app')

@section('style')
<!-- Additional CSS for select2 or other libraries if needed -->
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">POS <span>-Point of Sale</span></h1>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <form action="{{ route('add_to_cart') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Select Customer:</label>
                    <select class="form-control" id="customer_id" name="customer_id" required>
                        @foreach(App\Models\CustomerModel::all() as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id">Select Product:</label>
                    <select class="form-control" id="product_id" name="product_id" required onchange="updatePrice()">
                        @foreach(App\Models\ProductModel::all() as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" onchange="updatePrice()">
                </div>
               
                <button type="submit" class="btn btn-outline-success btn-icon-text"><i class="icon-info btn-icon-prepend"></i>Add to Order</button>
            </form>
            <br>
            <!-- Display cart -->
            @include('cart.cart_table') <!-- Include the cart table here -->
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // This function updates the price based on selected product and quantity
      function updatePrice() {
          var price = parseFloat($('#product_id').find('option:selected').data('price'));
          var quantity = parseInt($('#quantity').val());
          var totalPrice = price * quantity;
          $('#total_price').text('$' + totalPrice.toFixed(2));
      }
  
      // Attach the updatePrice function to change events on product_id and quantity fields
      $('#product_id, #quantity').change(updatePrice);
  
      // Call updatePrice on page load to set the initial value
      updatePrice();
  });
  </script>
<script>
  function updatePrice() {
    var price = $('#product_id').find('option:selected').data('price');
    var quantity = $('#quantity').val();
    $('#total_price').text((price * quantity).toFixed(2));
  }
  document.addEventListener('DOMContentLoaded', function () {
    updatePrice(); // To update price on initial load
  });

  function updatePrice() {
    var price = parseFloat($('#product_id').find('option:selected').data('price'));
    var quantity = parseInt($('#quantity').val());
    var totalPrice = price * quantity;
    $('#total_price').text(totalPrice.toFixed(2));
}

$(document).ready(function() {
    $('#product_id, #quantity').change(function() {
        updatePrice();
    });

    updatePrice(); // Initial call to set price
});

</script>



@endsection
