@include('components.header')
<div class="d-flex flex-column container w-100">
    <div class="d-flex flex-row flex-wrap w-100 mt-4">
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
@include('components.footer')
