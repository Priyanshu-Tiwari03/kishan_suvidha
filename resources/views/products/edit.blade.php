
  @extends('layouts.admin')
  @section('content')

    <div class="bg-dark py-3">
        <h3 class="text-white text-center">KS-Admin </h3>
    </div>
    <div class = "container">
    <div class = "row justify-content-center mt-4">
            <div class = "col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class = "row d-flex justify-content-center">
            <div class = "col-md-10">
                <div class = "card borde-0 shadow-lg my-4" >
                    <div class = "card-header bg-dark">
                        <h3 class ="text-white">Edit Product</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('products.update',$product->id) }}" method = "post">
                @method('put')
                @csrf
            <div class = "card-body">
                <div class = "mb-3">
                    <label for="" class = "form-label h5">Name</label>
                    <input value="{{ old('name',$product->name) }}" type ="text" class="@error('name') is-invalid @enderror
                     form-control form-control-lg" placeholder = "Name" name = "name">
                    @error('name')
                        <p class="invalid-feeback">{{ $message }}</p>
                    @enderror
                </div>

                <div class = "mb-3">
                    <label for="" class = "form-label h5">Sku</label>
                    <input value="{{ old('sku',$product->sku) }}" type ="text" class="@error('sku') is-invalid @enderror 
                    form-control form-control-lg" placeholder = "Stock_keeping unit" name = "sku">
                    @error('sku')
                        <p class="invalid-feeback">{{ $message }}</p>
                    @enderror
                </div>
                <div class = "mb-3">
                    <label for="" class = "form-label h5">Price</label>
                    <input value="{{ old('price',$product->price) }}" type ="text" class="@error('price') is-invalid @enderror
                     form-control form-control-lg" placeholder = "Price" name = "price">
                    @error('price')
                        <p class="invalid-feeback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
    <label for="category_id" class="form-label h5">Category</label>
    <select name="category_id" class="form-control form-control-lg @error('category_id') is-invalid @enderror">
    <option value="">Select a Category</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}" 
    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
    {{ $category->name }}
</option>

    @endforeach
</select>

    @error('category_id')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="sub_category_id" class="form-label h5">Sub-category</label>
    <select name="sub_category_id" class="form-control form-control-lg @error('sub_category_id') is-invalid @enderror">
        <option value="">Select Sub-category</option>
        @foreach ($subcategories as $subCategory)
            <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $product->sub_category_id ?? '') == $subCategory->id ? 'selected' : '' }}>
                {{ $subCategory->name }}
            </option>
        @endforeach
    </select>
    @error('sub_category_id')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>



</div>
                <div class = "mb-3">
                    <label for="" class = "form-label h5">Description</label>
                    <textarea placeholder="Description" class="form-control" name="description" cols="30" rows="5">{{ old('description', $product->description) }}</textarea>

                </div>
                <div class = "mb-3">
                    <label for="" class = "form-label h5">Image</label>
                    <input type ="file" class="form-control form-control-lg" placeholder = "Add your Image" name = "image">

                    @if($product->image != "")
                        <img class = "w-50 my-3" src="{{ asset('uploads/product/'.$product->image)}}" alt="">
                    @endif
                </div>
                <div class = "d-grid">
                    <button class = "btn btn-lg btn-primary">Update</button>
                </div>
            </div>
        </form>
        </div>

    </div>
 

    @endsection

