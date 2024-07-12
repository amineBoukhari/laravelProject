@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="border: 1px solid #ccc; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 20px; text-align: center;">
        <h1>{{ $product->name }}</h1>
        <p>Description: {{ $product->description }}</p>
        <p>Price: ${{ number_format($product->price, 2) }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-info">Back to list</a>

        <!-- Add To Cart Form -->
        <form action="{{ route('cart.add') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-success">Add To Cart</button>
        </form>
    </div>
</div>
@endsection
