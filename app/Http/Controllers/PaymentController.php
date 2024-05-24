<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Cart;
use Darryldecode\Cart\Cart as CartCart;
use Darryldecode\Cart\Facades\CartFacade;
use PDF;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $data['meta_title'] = 'Checkout';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('payment.checkout', $data);
    }

 
    public function view_cart(Request $request)
    {
$data['header_title'] = 'POS';




        return view('payment.cart',$data);
    }

    public function cart_delete($id)
    {
        \Cart::session(auth()->id())->remove($id);
        return redirect()->back()->with('success', 'Product removed from cart');
    }

    public function add_to_cart(Request $request)
    {
        $product = ProductModel::find($request->product_id);
        $customer = CustomerModel::find($request->customer_id);

        if ($product && $customer) {
            \Cart::session(auth()->id())->add(array(
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    
                ),
                'associatedModel' => $product
            ));
        } else {
            return redirect()->back()->with('error', 'Invalid Product or Customer!');
        }
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update_cart(Request $request)
    {
        foreach ($request->cart as $cart) {
            \Cart::session(auth()->id())->update($cart['id'], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $cart['qty']
                ),
            ));
        }
        return redirect()->back();
    }

    public function generateInvoice($id)
    {
        $cartItem = \Cart::session(auth()->id())->get($id);
        $customer = CustomerModel::find($cartItem->attributes->customer_id);
    
        $cartItems = \Cart::session(auth()->id())->getContent();
    
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    
        $tax = $subtotal * 0.05;
        $total = $subtotal + $tax;
    
        $data = [
            'invoiceNumber' => 'INV-' . str_pad($id, 3, '0', STR_PAD_LEFT),
            'invoiceDate' => now()->format('d/m/Y'),
            'dueDate' => now()->addDays(15)->format('d/m/Y'),
            'customer' => $customer,
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'seller' => [
                'name' => 'Inventory',
                'contact' => '01999999999',
                'address' => '123 Warehouse Road, Khulna',
            ],
        ];
    
        $pdf = PDF::loadView('invoice.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
    
}
