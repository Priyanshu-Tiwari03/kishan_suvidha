<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use App\Models\Product;

class RazorpayController extends Controller
{
    public function index()
    {
        return view('razorpay.index');
    }

    public function payment(Request $request)
    {
        $request->validate([
            'phone'     => 'required|string',
            'quantity'  => 'required|integer|min:1',
            'amount'    => 'required|numeric|min:1',
            'apartment' => 'required|string',
            'city'      => 'required|string',
            'district'  => 'required|string',
            'state'     => 'required|string',
            'pincode'   => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->sku) {
            return back()->with('error', 'Only ' . $product->sku . ' items left in stock.');
        }

        $totalAmount = $product->price * $request->quantity;

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $api->order->create([
            'receipt'         => 'order_' . uniqid(),
            'amount'          => $totalAmount * 100, // in paise
            'currency'        => 'INR',
            'payment_capture' => 1,
        ]);

        $payment = Payment::create([
            'user_id'     => auth()->id(),
            'name'        => auth()->user()->name,
            'email'       => auth()->user()->email,
            'phone'       => $request->phone,
            'amount'      => $totalAmount,
            'order_id'    => $order['id'],
            'status'      => 0,
            'product_id'  => $product->id,
            'unit_price'  => $product->price,
            'apartment'   => $request->apartment,
            'city'        => $request->city,
            'district'    => $request->district,
            'state'       => $request->state,
            'pincode'     => $request->pincode,
            'quantity'    => $request->quantity,
        ]);

        return view('payment', [
             'orderId' => $order['id'],
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'razorpayKey' => env('RAZORPAY_KEY'),
        ]);
    }

  
    public function success(Request $request)
    {
        if (!$request->razorpay_payment_id || !$request->razorpay_order_id) {
            return back()->with('error', 'Payment failed. Please try again.');
        }

        $payment = Payment::where('order_id', $request->razorpay_order_id)->first();

        if (!$payment) {
            return back()->with('error', 'Invalid payment record.');
        }


        $payment->update([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'status'              => 1, // success
        ]);

        // Reduce SKU from product
        $product = Product::find($payment->product_id);
        if ($product) {
            $product->sku -= $payment->quantity;
            $product->save();
        }

       // Remove from cart (example for DB cart)
    $cart = session()->get('cart', []);
unset($cart[$payment->product_id]);
session()->put('cart', $cart);

    return redirect()->route('myorder')->with('success', 'Payment Successful!');

    }
}
