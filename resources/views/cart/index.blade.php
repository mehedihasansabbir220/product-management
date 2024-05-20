@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if($cart)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $product_id => $item)
                <tr>
                    <td><img src="{{ asset($item['image']) }}" width="50"></td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['total'] }}</td>
                    <td>
                        <a href="{{ route('cart.remove', $product_id) }}" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total: {{ $total }}</h3>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
