@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>
    <form>
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" placeholder="John Doe">
        </div>
        <div class="mb-3">
            <label for="emailAddress" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="emailAddress" placeholder="john@example.com">
        </div>
        <div class="mb-3">
            <label for="shippingAddress" class="form-label">Shipping Address</label>
            <input type="text" class="form-control" id="shippingAddress" placeholder="1234 Main St">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" placeholder="Anytown">
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State/Province</label>
            <input type="text" class="form-control" id="state" placeholder="State">
        </div>
        <div class="mb-3">
            <label for="zipCode" class="form-label">Zip/Postal Code</label>
            <input type="text" class="form-control" id="zipCode" placeholder="123456">
        </div>
        <div class="mb-3">
            <label for="paymentMethod" class="form-label">Payment Method</label>
            <select class="form-select" id="paymentMethod">
                <option selected>Choose...</option>
                <option value="creditCard">Credit Card</option>
                <option value="debitCard">Debit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="cardDetails" class="form-label">Card Details</label>
            <input type="text" class="form-control" id="cardDetails" placeholder="Card Number">
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
        
    </form>
    <br/>
</div>
@endsection