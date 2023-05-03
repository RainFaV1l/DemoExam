@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <section>
        <h1>Register</h1>
        @include('components.errors')
        <form id="create-user-form" method="post" action="{{ route('auth.createUser') }}">
            @csrf
            <input value="{{ old('name') }}" type="text" name="name" placeholder="Имя">
            <input value="{{ old('surname') }}" type="text" name="surname" placeholder="Фамилия">
            <input value="{{ old('midname') }}" type="text" name="midname" placeholder="Отчество">
            <input value="{{ old('login') }}" type="text" name="login" placeholder="Логин">
            <input value="{{ old('email') }}" type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Пароль">
            <input type="password" name="repeat_password" placeholder="Повторите пароль">
            <label>
                <input type="checkbox" name="rules">
                Я согласен(на) с правилами регистрации
            </label>
            <button type="submit">Регистрация</button>
        </form>
    </section>
@endsection
