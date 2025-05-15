@extends('layouts.user')

@section('content')
<div class="container py-4">
    <h2>All Products in {{ $category }}</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse($products as $product)
            <div class="col">
                <a href="{{ route('product.detail', $product->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100">
                        <img src="{{ asset('uploads/product/' . $product->image) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="text-success fw-bold">₹{{ $product->price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p>No products available in this category.</p>
        @endforelse
    </div>
</div>
@endsection
