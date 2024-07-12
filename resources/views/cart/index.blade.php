@extends('layouts.app')

@section('content')
<style>
    .centered-container {
        margin: auto;
        width: 50%; /* Adjust width as necessary */
        padding: 20px;
        text-align: center;
    }
    .centered-container ul {
        list-style-type: none;
        padding: 0;
    }
    .centered-container li {
        background-color: #f8f9fa; /* Light grey background */
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #dee2e6; /* Light grey border */
        box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Subtle shadow */
    }
    .centered-container input[type="number"] {
        text-align: center;
    }
    .btn-outline-primary, .btn-outline-danger {
        margin: 0 5px;
    }
</style>

<div class="container centered-container">
	<h2>My Cart</h2>
	<ul>
		@foreach ($cartItems as $item)
			<li>
				{{ $item->product->name }} - ${{ $item->product->price }} x 
				<form action="{{ route('cart.updateQuantity', $item->id) }}" method="POST" style="display: inline-block;">
					@csrf
					<input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 60px;">
					<button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
				</form>
				<form action="{{ route('cart.removeItem', $item->id) }}" method="POST" style="display: inline-block;">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
				</form>
			</li>
		@endforeach
	</ul>
	<h3>Total: ${{ $total }}</h3>
	<a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Checkout</a>
</div>
@endsection
