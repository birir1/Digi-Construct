{{-- <section class="product-category">
    <h3>Category 1</h3>
    <div class="products-grid">
        @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ $product->image_url }}" alt="{{ $product->product }}">
            <h4>{{ $product->product }}</h4>
            <p>{{ $product->description }}</p>
            <p class="price">${{ $product->price }}</p>
            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Add to Cart</a>
        </div>
        @endforeach
    </div>
</section> --}}


@extends('layouts.app')

@section('title', 'Products Page')

@section('content')
<section class="product-category">
    
    <div class="products-grid">
        @foreach ($products as $product)
        <div class="product-card">
            <img src="{{ $product->image_url }}" alt="{{ $product->product }}">
            <h4>{{ $product->product }}</h4>
            <p>{{ $product->description }}</p>
            <p class="price">${{ $product->price }}</p>
            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Add to Cart</a>
        </div>
        @endforeach
    </div>

    <h3>Category 1</h3>
</section>

@endsection
