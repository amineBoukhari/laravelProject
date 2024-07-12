@extends('layouts.app')

@section('content')
<div class="container">
	<h2>My Cart</h2>
	<ul>
		@foreach ($cartItems as $item)
			<br/>
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
	<br/>
	<a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Checkout</a>
</div>
@endsection