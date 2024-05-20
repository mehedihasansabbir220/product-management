@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <tr>
                <td><img src="{{ asset('storage/' . $details['image']) }}" width="50"></td>
                <td>{{ $details['name'] }}</td>
                <td>{{ $details['quantity'] }}</td>
                <td>${{ $details['price'] }}</td>
                <td>${{ $details['price'] * $details['quantity'] }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">Your cart is empty</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div>
        <h3>Total: ${{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', []))) }}</h3>
    </div>
</div>
@endsection
