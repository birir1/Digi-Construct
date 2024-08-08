@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products List</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Shipping Fee</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product }}</td>
                <td>{{ $product->quantity }}</td>
                <td>${{ $product->price }}</td>
                <td>${{ $product->shipping_fee }}</td>
                <td>${{ $product->total }}</td>
                <td>{{ $product->status }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
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
