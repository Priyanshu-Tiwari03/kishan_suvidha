@extends('layouts.user')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('uploads/product/'.$product['image']) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6"> 
             <h2>{{ $product['name'] }}</h2>
                <p class="mt-3"> {{ $product['description'] }}</p>
               
                <p class="text-muted">Category:- {{ $product->category->name }}</p>
                <p class="text-muted">SubCategory:- {{ $product->subcategory->name }}</p>
                 <p class="text-muted">Available Quantity: {{ $product->sku }}</p>
                <p class="text-success fw-bold fs-4">Price: ₹{{ $product['price'] }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                
                <button type="submit" class="btn btn-primary">Add to Cart</button>
                
            </form>
            
        </div>
    </div>
</div>

    {{-- Ratings & Reviews --}}
    <div class="w-100 py-4" style="background-color: #f8f9fa;">
        <div class="d-flex flex-wrap justify-content-between align-items-start px-3 px-md-5">
            {{-- Rating Summary --}}
            <div class="flex-grow-1 me-md-3 mb-4" style="min-width: 300px;">
                <div class="bg-white p-4 shadow rounded">
                    <h3>Ratings & Reviews</h3>
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ratingModal">Rate Product</button>
                    <!-- Review Modal -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Rate this Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @if ($hasPurchased)
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <select name="rating" class="form-select" required>
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }} ★</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            @else
                <div class="alert alert-warning">
                    You haven't purchased this product yet.
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>

                    <h2>{{ number_format($avgRating ?? 0, 1) }} ★</h2>
                    <p>{{ $product->reviews->count() }} Ratings & Reviews</p>

                    @for ($i = 5; $i >= 1; $i--)
                        <div class="d-flex align-items-center mb-1">
                            <span class="me-2">{{ $i }} ★</span>
                            <div class="progress flex-grow-1 me-2" style="height: 10px;">
                                <div class="progress-bar bg-info" style="width: 0%;"></div>
                            </div>
                            <span>0</span>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Customer Reviews --}}
            <div class="flex-grow-1 ms-md-3 mb-4" style="min-width: 300px;">
                <div class="bg-white p-4 shadow rounded">
                    <h5>Customer Reviews</h5>
                    <div class="border rounded p-3" style="height: 350px; overflow-y: auto;">
                        @forelse ($product->reviews as $review)
                            <div class="mb-3">
                                <strong>{{ $review->user->name ?? 'User' }}</strong>
                                <span class="text-warning">★ {{ $review->rating }}</span>
                                <p>{{ $review->comment }}</p>
                                <hr>
                            </div>
                        @empty
                            <p class="text-muted">No reviews yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
