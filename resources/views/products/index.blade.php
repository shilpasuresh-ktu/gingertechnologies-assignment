@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Product Listing</h2>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Category: {{ $product->category->name }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Details</a>
                    <form method="post" action="{{ route('products.addToCart', $product->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection