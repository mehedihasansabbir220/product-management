@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Products</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card" style="height: 500px">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">${{ $product->sell_price }}</p>
                    @if($product->discount_code)
                    <p class="card-text">Discount Code: {{ $product->discount_code }}</p>
                    @endif
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
