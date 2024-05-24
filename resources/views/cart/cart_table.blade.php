@php
    $cartItems = \Cart::session(auth()->id())->getContent();
@endphp

@if (!$cartItems->isEmpty())
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Customer</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->attributes->customer_name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        <td class="remove-col">
                            <form action="{{ route('cart.delete', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-icon-text">  <i class="icon-cloud-upload  btn-icon-prepend"></i>Remove</button>
                            </form>
                            <form action="{{ route('cart.invoice', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-icon-text"><i class="icon-printer btn-icon-prepend"></i>Invoice</button>
                            </form>
                            <a class="btn btn-outline-success btn-icon-text" href={{url('/checkout/'.$item->id.'/'.$item->quantity)}}>Pay</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>Your cart is empty.</p>
@endif

