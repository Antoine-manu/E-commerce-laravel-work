@include('components.header')

<div class="container mt-5">
    <h1>Mon panier</h1>
    <hr>
    <div class="cart-item d-flex">
        <div class="d-flex flex-column col-4">
            <img src="{{asset('chaise.webp')}}" class="cardItem-img" alt="" width="50" height="50">
        </div>
        <div class="d-flex flex-column col-8 justify-content-between">
            <div class="d-flex flex-row">
                <h3>Chaise</h3>
            </div>
            <div class="d-flex flex-row align-self-end">
                <div class="flex-column">
                    <label for="quantity">Quantité</label>
                    <input type="number" id="quantity">
                </div>
                <div class="flex-column ms-5">
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash" title="Supprimer l'article"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
