@extends('layouts.user')

@section('content')
<div class="container py-5">
    <h2>Your Shopping Cart</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Check if cart is not empty --}}
    @if(count($cart) > 0)
        <div class="row">
            @foreach($cart as $id => $item)
                <div class="col-md-6 mb-4">
                <a href="{{ route('cart.productbuy', $id) }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/product//' . $item['image']) }}" 
                                     class="img-fluid rounded-start" 
                                     alt="{{ $item['name'] }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['name'] }}</h5>
                                    <p class="card-text text-muted">Quantity: {{ $item['quantity'] }}</p>
                                    <p class="card-text text-success fw-bold">₹{{ $item['price'] }}</p>
                                    {{-- Optional Remove Button --}}
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm mt-2">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-4">
            Your cart is empty. Start adding some products!
        </div>
    @endif
</div>
@endsection
