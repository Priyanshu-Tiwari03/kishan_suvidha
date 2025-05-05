@extends('layouts.user')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">  
            <h2>{{ $product->name }}</h2>
            <p class="mt-3">{{ $product->description }}</p>
            <p class="text-muted">Available Quantity: {{ $product->quantity }}</p>
            <p class="text-success fw-bold fs-4">₹{{ $product->price }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="quantity" class="form-label">Select Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control w-25" value="1" min="1" max="{{ $product->quantity }}">
                </div>
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection
