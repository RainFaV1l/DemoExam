@extends('layouts.layout')

@section('title', 'Admin Panel')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="section__title">Admin Panel</h1>
            <div class="blocks">
                <div class="block">
                    <h2 class="block__title">Products</h2>
                    <div class="table">
                        <div class="table-item">
                            <span>ID</span>
                            <span>Name</span>
                            <span>Price</span>
                            <span>Actions</span>
                        </div>
                        @foreach($products as $product)
                            <div class="table-item">
                                <span>{{ $product->id }}</span>
                                <span>{{ $product->name }}</span>
                                <span>{{ $product->money() }}</span>
                                <span>
                                    <a href="" class="Edit"></a>
                                    <a href="" class="Remove"></a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="block">
                    <h2 class="block__title">Collections</h2>
                    <div class="table">
                        <div class="table-item">
                            <span>ID</span>
                            <span>Name</span>
                            <span>Products</span>
                            <span>Actions</span>
                        </div>
                        @foreach($collections as $collection)
                            <div class="table-item">
                                <span>{{ $collection->id }}</span>
                                <span>{{ $collection->name }}</span>
                                <span>{{ $collection->products->count() }}</span>
                                <span>
                                    <a href="">Edit</a>
                                    <a href="">Remove</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="block">
                    <h2 class="block__title">Orders</h2>
                    <div class="table">
                        <div class="table-item">
                            <span>ID</span>
                            <span>User</span>
                            <span>Total</span>
                            <span>Actions</span>
                        </div>
                        @foreach($orders as $order)
                            <div class="table-item">
                                <span>{{ $order->id }}</span>
                                <span>{{ $order->user->full_name }}</span>
                                <span>{{ $order->total }}</span>
                                <span>
                                    <a href="{{ route('order.toggle', [$order, 'status=delivered']) }}">Delivered</a>
                                    <a href="">Remove</a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
