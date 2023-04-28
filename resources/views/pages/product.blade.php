@extends('layouts.layout')

@section('title', $product->name)

@section('content')
    <section class="section products-section">
        <div class="container">
            <header class="section-header">
                <h1 class="section-header__title">Product</h1>
            </header>
            <div class="product">
                <div class="image">
                    <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">
                </div>
                <div class="product-info">
                    <h2 class="product__title">{{ $product->name }}</h2>
                    <p class="product__short">{{ $product->short_text }}</p>
                    <p class="product__price">{{ $product->money() }}</p>
                    <a href="{{ route('product.addToCart', $product) }}" class="button">Add to cart</a>
                </div>
            </div>
        </div>
    </section>
@endsection
