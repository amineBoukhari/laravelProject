@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Products</h1>
    <p>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    </p>

    <!-- Add Category Form -->
    <div class="mb-4">
        <h4>Add New Category</h4>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="categoryName">Category Name:</label>
                <input type="text" class="form-control" id="categoryName" name="name" required>
            </div>
            <div class="form-group">
                <label for="categoryDescription">Description (Optional):</label>
                <textarea class="form-control" id="categoryDescription" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add Category</button>
        </form>
    </div>

    <!-- Category Filter Form -->
    <form method="GET" action="{{ route('products.index') }}" class="mb-4">
        <div class="form-group">
            <label for="category">Filter by Category:</label>
            <select id="category" name="category" class="form-control" onchange="this.form.submit()">
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </form>

    @if ($products->isEmpty())
        <div class="alert alert-info mt-4">
            No products found.
        </div>
    @else
        <div class="row mt-4">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $product->category->name ?? 'No category' }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            <div class="btn-group">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
