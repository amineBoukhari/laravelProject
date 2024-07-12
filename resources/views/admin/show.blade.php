<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
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
@endsection
