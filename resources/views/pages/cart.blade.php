@extends('layouts.layout')

@section('title', 'Cart')

@section('content')
    <section class="section cart-section">
        <div class="container">
            @if(session()->has('message'))
                <p>{{ session()->get('message') }}</p>
            @endif
            <h1 class="section__title">
                Cart - {{ $cart->getTotal() }}
            </h1>

            <a href="{{ route('cart.createOrder') }}" class="button">Сделать заказ</a>

            @if($cart->isEmpty())
                <h2>Корзина пустая</h2>
            @else
                <div class="cart-items">
                    @foreach($cart->get() as $item)
                        <div class="cart-item">
                            <div class="image">
                                <img src="{{ $item->imageUrl() }}" alt="image">
                            </div>
                            <h2 class="cart-item__title">{{ $item->name }}</h2>
                            <p class="cart-item__price">{{ $item->money() }}</p>
                            <p class="cart-item__qty">2 шт.</p>
                            <a href="{{ route('cart.remove', $item) }}" class="button">Remove</a>
                        </div>
                    @endforeach
                </div>
                <div class="cart-total">
                    <h3>Total: {{ $cart->getTotal() }}</h3>
                    <form id="js-checkout">
                        @csrf
                        <input type="password" name="password" placeholder="Введите пароль">
                        <button class="button">Checkoit</button>
                    </form>
                </div>
            @endif
        </div>
    </section>
@endsection
