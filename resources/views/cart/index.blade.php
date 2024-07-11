@extends('layouts.app')

@section('content')
<div class="container">
	<h2>My Cart</h2>
	<ul>
		@foreach ($cartItems as $item)
			<li>{{ $item->product->name }} - ${{ $item->product->price }} x {{ $item->quantity }}</li>
		@endforeach
	</ul>
	<h3>Total: ${{ $total }}</h3>
</div>
@endsection