@include('components.header')
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between flex-row w-100">
            <div class="w-50 d-flex align-items-center justify-content-center">
                <img src="{{asset('profil.svg')}}" class="w-75" alt="">
            </div>
            <div class="w-50">
                <span style="font-size: 24px">Vos informations</span>
            
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        <p class="card-text"><strong>Email: </strong>{{ Auth::user()->email }}</p>
                        <p class="card-text"><strong>Date d'inscription: </strong>{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        <a href="#" class="btn btn-primary">Modifier le profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('components.footer')