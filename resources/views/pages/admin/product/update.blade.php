@extends('layouts.layout')

@section('title', 'Update Product ' . $product->name)

@section('content')
    <section class="section">
        @include('components.errors')
        <div class="container">
            <h1 class="section__title">Update product</h1>
            <form method="post" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
                @csrf
                <input value="{{ $product->name }}" type="text" name="name" placeholder="Название продукта">
                <input value="{{ $product->short_text }}" type="text" name="short_text" placeholder="Краткое описание">
                <input value="{{ $product->price }}" type="number" name="price" placeholder="Введите стоимость продукта">
                <input value="{{ $product->quantity }}" type="number" name="quantity" placeholder="Введите количество">
                <div class="image">
                    <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">
                </div>
                <input type="file" name="image_path">
                <label>
                    <input type="checkbox" @if($product->is_published) checked @endif name="is_published">
                    Publish?
                </label>
                <textarea name="text" placeholder="Описание продукта">{{ $product->text }}</textarea>
                <select name="collection_id">
                    @foreach($collections as $collection)
                        <option @if($product->collection_id === $collection->id) selected @endif value="{{ $collection->id }}">{{ $collection->name }} - {{ $collection->products()->count() }} шт.</option>
                    @endforeach
                </select>
                <button type="submit">Update product</button>
            </form>
        </div>
    </section>
@endsection
