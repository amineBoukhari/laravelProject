<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>Description: {{ $product->description }}</p>
    <p>Price: ${{ number_format($product->price, 2) }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-info">Back to list</a>
</div>
@endsection
