@extends('layouts.user')

@section('content')
    <div class="container py-5">
        <h2>Your Wishlist</h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Check if wishlist is not empty --}}
        @if(count($wishlist) > 0)
            <div class="row">
                @foreach($wishlist as $id => $item)
                    <div class="col-md-6 mb-4">
                    <a href="{{ route('wishlist.productview', $id) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm border-0">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('uploads/product/' . $item['image']) }}" 
                                         class="img-fluid rounded-start" 
                                         alt="{{ $item['name'] }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item['name'] }}</h5>
                                        <p class="card-text text-success fw-bold">₹{{ $item['price'] }}</p>

                                        {{-- Optional Remove Button --}}
                                        <form action="{{ route('wishlist.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm mt-2">Remove</button>
                                        </form>

                                        {{-- Optional Add to Cart Button --}}
                                        <form action="{{ route('wishlist.addToCart', $id) }}" method="POST" class="mt-2">
                                            @csrf
                                            <button class="btn btn-outline-primary btn-sm">Add to Cart</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info mt-4">
                Your wishlist is empty. Start adding products you love!
            </div>
        @endif
    </div>
@endsection
