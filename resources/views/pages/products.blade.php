@extends('layouts.layout')

@section('title', 'All products')

@section('content')
    <section class="section products-section">
        <div class="container">
            <header class="section-header">
                <h1 class="section-header__title">All products</h1>
            </header>
            <div class="collections">
                @foreach($collections as $collection)
                    <a href="?collection={{ $collection->id }}" class="collection">{{ $collection->name }}</a>
                @endforeach
            </div>
            <div class="products">
                @foreach($products as $product)
                    <div class="product">
                        <div class="image">
                            <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">
                        </div>
                        <div class="product-info">
                            <h2 class="product__title">{{ $product->name }}</h2>
                            <p class="product__short">{{ $product->short_text }}</p>
                            <p class="product__price">{{ $product->money() }}</p>
                            <a href="" class="button">Add to cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
