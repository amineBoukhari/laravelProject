@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Product Edit Form -->
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Product Name -->
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <!-- Product Description -->
        <div class="form-group">
            <label for="description">Product Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Product Price -->
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <!-- Product Category -->
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category_id'))
                <span class="text-danger">{{ $errors->first('category_id') }}</span>
            @endif
        </div>

        <!-- Submit and Cancel Buttons -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
