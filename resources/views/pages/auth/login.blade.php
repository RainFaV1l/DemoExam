@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <section>
        <h1>Login</h1>
        @include('components.errors')
        <form method="post" action="{{ route('auth.loginUser') }}">
            @csrf
            <input value="{{ old('login') }}" type="text" name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <button type="submit">Авторизация</button>
        </form>
    </section>
@endsection
