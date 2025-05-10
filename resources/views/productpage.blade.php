@extends('layouts.user')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('uploads/product/'.$product['image']) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">  
            <h2>{{ $product->name }}</h2>
            <p class="mt-3">{{ $product->description }}</p>
            <p class="text-muted">Available Quantity: {{ $product->sku }}</p>
            <p class="text-success fw-bold fs-4">Price:- ₹{{ $product->price }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                
                <button type="submit" class="btn btn-primary">Add to Cart</button>
                
            </form>
            
        </div>
    </div>
</div>
<div class="w-100 py-4" style="background-color: #f8f9fa;">
    <div class="d-flex flex-wrap justify-content-between align-items-start px-3 px-md-5">
        {{-- Ratings & Reviews --}}
        <div class="flex-grow-1 me-md-3 mb-4" style="min-width: 300px;">
            <div class="bg-white p-4 shadow rounded">
                <h3>Ratings & Reviews</h3>
                <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ratingModal">Rate Product</a>
                <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      @if(!$hasPurchased)
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="ratingModalLabel">Access Denied</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          You haven't bought this product yet. You can only rate after purchase.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      @else
        <form action="{{ route('product.review', $product->id) }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="ratingModalLabel">Rate This Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            {{-- Star Rating --}}
            <div class="mb-3">
              <label class="form-label">Rating</label>
              <select class="form-select" name="rating" required>
                <option value="">Select Rating</option>
                @for($i = 5; $i >= 1; $i--)
                  <option value="{{ $i }}">{{ $i }} Star</option>
                @endfor
              </select>
            </div>

            {{-- Comment --}}
            <div class="mb-3">
              <label for="comment" class="form-label">Comment</label>
              <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit Review</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>
                <h2>0.0 ★</h2>
                <p>0 Ratings & Reviews</p>

                @for ($i = 5; $i >= 1; $i--)
                    <div class="d-flex align-items-center mb-1">
                        <span class="me-2">{{ $i }} ★</span>
                        <div class="progress flex-grow-1 me-2" style="height: 10px;">
                            <div class="progress-bar bg-info" style="width: 0%;"></div>
                        </div>
                        <span>0</span>
                    </div>
                @endfor
                <br>
                <br>
                
            </div>
        </div>

        {{-- Customer Reviews --}}
        <div class="flex-grow-1 ms-md-3 mb-4    " style="min-width: 300px;">
            <div class="bg-white p-4 shadow rounded">
                <h5>Customer Reviews</h5>
                <div class="border rounded p-3" style="height: 350px; overflow-y: auto;">
                    <p class="text-muted">No reviews yet.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
