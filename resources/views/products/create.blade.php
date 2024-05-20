@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Product Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="buy_price">Buy Price:</label>
            <input type="text" name="buy_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sell_price">Sell Price:</label>
            <input type="text" name="sell_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="discount_code">Discount Code:</label>
            <input type="text" name="discount_code" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection
