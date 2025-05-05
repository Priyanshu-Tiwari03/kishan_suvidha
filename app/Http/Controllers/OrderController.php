<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'product'])->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
         $users = \App\Models\User::all();
    $products = \App\Models\Product::all();
    return view('orders.create', compact('users', 'products'));
   
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'uid' => 'required|exists:users,id',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'pincode' => 'required|string|max:10',
        'phone' => 'required|string|max:15',
        'pid' => 'required|exists:products,id',
        'category' => 'required|string|max:100',
        'sub_category' => 'required|string|max:100',
        'quantity' => 'required|integer|min:1',
        'total_price' => 'required|numeric|min:0',
        'payment_type' => 'required|in:COD,Online',
        'payment_status' => 'sometimes|in:Pending,Completed,Failed',
        'order_status' => 'sometimes|in:Processing,Shipped,Delivered,Cancelled',
    ]);

    $validated['order_date'] = now();

    Order::create($validated);

    return redirect()->route('orders.index')->with('success', 'Order created successfully!');
}

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $order = Order::with(['user', 'product'])->findOrFail($id);
    return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
    $users = \App\Models\User::all();
    $products = \App\Models\Product::all();
    return view('orders.edit', compact('order', 'users', 'products'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

    $validated = $request->validate([
        'address' => 'sometimes|string|max:255',
        'city' => 'sometimes|string|max:100',
        'pincode' => 'sometimes|string|max:10',
        'phone' => 'sometimes|string|max:15',
        'quantity' => 'sometimes|integer|min:1',
        'total_price' => 'sometimes|numeric|min:0',
        'payment_type' => 'sometimes|in:COD,Online',
        'payment_status' => 'sometimes|in:Pending,Completed,Failed',
        'order_status' => 'sometimes|in:Processing,Shipped,Delivered,Cancelled',
    ]);

    $order->update($validated);

    return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
}
    
}
