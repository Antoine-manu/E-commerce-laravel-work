<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start me-4">
        <img src="{{asset('magento-logo.jpg')}}" style="width: 120px" alt="">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Produits</a></li>
            <li><a href="/contact" class="nav-link px-2 link-body-emphasis">Contactez nous !</a></li>
            <li><a href="/products" class="nav-link px-2 link-body-emphasis">Admin</a></li>
        </ul>
        @auth
        
        <a href="/cart" class="nav-link px-2 link-body-emphasis me-3 text-primary"><i class="fa-solid fa-xl fa-cart-shopping"></i></a>
        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="/profil">Mon profil</a></li>
                <li><a class="dropdown-item" href="/orders">Vos commandes</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="/login">Déconnexion</a></li>
            </ul>
        </div>
        @else
            <a class="btn btn-outline-primary" href="/login">Se connecter</a>
        @endauth
    </div>
</div>
</header>
