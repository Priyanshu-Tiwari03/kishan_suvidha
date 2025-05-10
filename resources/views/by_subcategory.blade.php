
@extends('layouts.user')

@section('content')
    <h1>Products in {{ $subcategory->name }}</h1>

    @if($products->count())
        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card">
                <img src="{{ asset('uploads/product/'.$product->image) }}"  alt="{{ $product->name }}">
                    <h6>{{ $product->name }}</h6>
                    <p class="card-text">₹{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('product.detail', $product->id) }}" class="btn btn-success">View Details</a>
                </div>
            @endforeach
        </div>
    @else
        <p>No products found in this subcategory.</p>
    @endif
@endsection

<style>
.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.product-card {
    border: 1px solid #ddd;
    padding: 10px;
    width: 200px;
    text-align: center;
}

.product-card img {
    width: 150px;
    height: 150px;
    object-fit: cover;
}
</style>
