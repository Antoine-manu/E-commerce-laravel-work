@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/images/' . $product->image ) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <span style="font-size: 20px" class="mt-2 mb-3">{{ $product->price }} euros</span>
            <form action="{{ route('cart.add') }}" class="d-flex flex-row justify-content-between" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group d-flex flex-row justify-content-between align-items-center mt-2 w-75">
                    <label for="quantity" class="me-2">Quantité</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>
@endsection
