@extends('layouts.app')

@section('template_title')
    Commande réussie
@endsection

@section('content')
<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Merci pour votre commande !</h4>
        <p>Votre commande a été passée avec succès. Voici les détails de votre commande :</p>
        <hr>
        <h5>Numéro de commande : {{ $order->id }}</h5>
        <p>Date : {{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Récapitulatif de la commande</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }} €</td>
                            <td>{{ number_format($item->price * $item->quantity, 2) }} €</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total :</th>
                        <th>{{ number_format($order->total, 2) }} €</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
