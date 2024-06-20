@include('components.header')

<div class="container mt-5">
    <h1>Mon panier</h1>
    <hr>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(!empty($cart))
        @foreach($cart as $id => $details)
            <div class="cart-item d-flex mb-3">
                <div class="d-flex flex-column col-4">
                    <img src="{{ asset('storage/images/' . $details['image']) }}" class="cardItem-img" alt="" width="50" height="50">
                </div>
                <div class="d-flex flex-column col-8 justify-content-between">
                    <div class="d-flex flex-row">
                        <h3>{{ $details['name'] }}</h3>
                    </div>
                    <div class="d-flex flex-row align-self-end">
                        <div class="flex-column">
                            <label for="quantity">Quantité</label>
                            <input type="number" id="quantity-{{ $id }}" name="quantity" value="{{ $details['quantity'] }}" class="form-control">
                        </div>
                        <div class="flex-column ms-5">
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <input type="hidden" name="quantity" id="form-quantity-{{ $id }}">
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('form-quantity-{{ $id }}').value = document.getElementById('quantity-{{ $id }}').value; this.closest('form').submit();">
                                    Mettre à jour
                                </button>
                            </form>
                            <form action="{{ route('cart.remove') }}" method="POST" class="mt-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash" title="Supprimer l'article"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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
