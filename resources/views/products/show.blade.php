
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>{{ $product->name }}</h2>
        <div class="card">
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <p class="card-text">Category: {{ $product->category->name }}</p>
                <p class="card-text">Description: {{ $product->description }}</p>
                <form method="post" action="{{ route('products.addToCart', $product->id) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection
