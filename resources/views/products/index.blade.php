@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Sell Price</th>
                <th>Discount Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><img src="{{ asset('storage/' . $product->image) }}" width="50"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->sell_price }}</td>
                <td>{{ $product->discount_code }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
