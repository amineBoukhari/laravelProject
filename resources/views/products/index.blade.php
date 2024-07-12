@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Products</h1>
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
