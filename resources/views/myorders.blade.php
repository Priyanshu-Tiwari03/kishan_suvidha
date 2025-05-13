@extends('layouts.user')

@section('content')
<div class="container py-4">
    <h2>My Orders</h2>
    @forelse ($orders as $order)
        <div class="card mb-3">
            <div class="card-header bg-success text-white">
                Order #{{ $order->order_id }}
            </div>
            <div class="card-body">
                <p><strong>Product:</strong> {{ $order->product->name ?? 'Deleted Product' }}</p>
                <p><strong>Amount:</strong> ₹{{ $order->amount }}</p>
                <p><strong>Status:</strong> {{ $order->status ? 'Paid' : 'Pending' }}</p>
                <p><strong>Ordered on:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>
    @empty
        <p>No orders found.</p>
    @endforelse
</div>
@endsection
