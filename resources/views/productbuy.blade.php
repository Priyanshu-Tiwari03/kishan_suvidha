
@extends('layouts.user')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('uploads/product/'.$product['image']) }}" 
                 class="img-fluid rounded shadow" 
                 alt="{{ $product['name'] }}">
        </div>
        <div class="col-md-7">
            <h2>{{ $product['name'] }}</h2>
            <p class="mt-3">Detailed description or product info can go here.</p>
            <p class="text-muted">Quantity in Cart: {{ $product['quantity'] }}</p>
            <p class="text-success fw-bold fs-4">Price: ₹{{ $product['price'] }}</p>
            <p class="text-info fs-5">Total: ₹{{ $product['price'] * $product['quantity'] }}</p>

            <form action="#" method="POST">
                @csrf
                {{-- Optional: Add actual buy logic here --}}
                <button class="btn btn-success">Buy Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
