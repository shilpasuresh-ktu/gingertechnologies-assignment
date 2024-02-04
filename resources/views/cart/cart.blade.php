<!-- resources/views/cart/cart.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Your Cart</h2>

        @forelse($cart as $id => $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['name'] }} - ID: {{ $id }}</h5>
                    <p class="card-text">Description: {{ $item['description'] }}</p>
                </div>
            </div>
        @empty
            <p>Your cart is empty.</p>
        @endforelse

        <form method="post" action="{{ route('cart.sendToWhatsApp') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Send to WhatsApp</button>
        </form>
    </div>
@endsection
