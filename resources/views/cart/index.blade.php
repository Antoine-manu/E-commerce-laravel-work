@include('components.header')

<div class="container mt-5">
    <h1>Mon panier</h1>
    <hr>
    <div class="d-flex flex-row justify-content-between mt-3">
        <div class="w-75">
            <table class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th >Produit</th>
                        <th >Prix</th>
                        <th >Quantité</th>
                        <th >Total</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td >{{$product["name"]}}</td>
                            <td >{{$product["price"]}}</td>
                            <td >{{$product["quantity"]}}</td>
                            <td >{{$product["total"]}}</td>
                            <td >Actions</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-25 d-flex flex-column ms-4">
            <div class="card p-4">
                <h3 class="mt-3">Total du panier : {{$total}} €</h3>
                <hr>
                <form action="" method="POST">
                    @csrf
                    <button class="btn btn-primary mt-3">Commander</button>
                </form>
            </div>
        @endforeach
        <form action="{{ route('order.create') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Passer la commande</button>
        </form>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@include('components.footer')
