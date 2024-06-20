@include('components.header')
<div class="d-flex flex-column align-items-center w-100">
    <div class="position-relative overflow-hidden p-3 w-100 p-md-5 m-md-3 text-center bg-body-tertiary">
        <div class="col-md-6 p-lg-5 mx-auto my-5 ">
            <h1 class="display-3 fw-bold">Bienvenue sur notre super site</h1>
            <h3 class="fw-normal text-muted mb-3">Lachez un max de thunes svp</h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
            <a class="icon-link" href="/">
                Voir les produits
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
            <a class="icon-link" href="/login">
                Se connecter
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
            </div>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    <div class="w-100 align-self-center mt-5 container">
      <div class="d-flex flex-row justify-content-between w-100 align-items-center">
        <h3 class="mt-2 mb-2">A la une </h3>
        <a href="/" class="btn btn-outline-primary">
          Voir tout
        </a>
      </div>
      <hr>
        <div class="d-flex flex-row flex-wrap ">
          @foreach ($products as $produit)
              <div class="cardItem">
                  <img src="{{ asset('storage/images/' . $produit->image) }}" class="cardItem-img" alt="">
                  <div class="d-flex flex-row align-items-center justify-content-between w-100 mt-4">
                      <div class="d-flex flex-column">
                          <a class="cardItem-title text-primary" href="{{route('product.showPublic', $produit->id)}}">{{$produit->name}}</a>
                          <span class="cardItem-subtitle">{{$produit->price}} euros</span>
                      </div>
                      <form action="{{ route('cart.add') }}" method="POST">
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $produit->id }}">
                          <input type="hidden" name="quantity" value="1">
                          <button type="submit" class="btn btn-primary circle">
                              <i class="fa-solid fa-cart-plus"></i>
                          </button>
                      </form>
                  </div>
              </div>
          @endforeach
          </div>
        </div>
    </div>
</div>

@include('components.footer')