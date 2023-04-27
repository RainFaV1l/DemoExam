@extends('layouts.layout')

@section('title', 'Create Product')

@section('content')
    <section class="section">
        @include('components.errors')
        <div class="container">
            <h1 class="section__title">Create new product</h1>
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Название продукта">
                <input type="text" name="short_text" placeholder="Краткое описание">
                <input type="number" name="price" placeholder="Введите стоимость продукта">
                <input type="number" name="quantity" placeholder="Введите количество">
                <input type="file" name="image_path">
                <label>
                    <input type="checkbox" checked name="is_published">
                    Publish?
                </label>
                <textarea name="text" placeholder="Описание продукта"></textarea>
                <select name="collection_id">
                    @foreach($collections as $collection)
                        <option value="{{ $collection->id }}">{{ $collection->name }} - {{ $collection->products()->count() }} шт.</option>
                    @endforeach
                </select>
                <button type="submit">Create new product</button>
            </form>
        </div>
    </section>
@endsection
