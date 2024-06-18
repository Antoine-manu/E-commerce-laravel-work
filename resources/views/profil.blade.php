@include('components.header')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mb-4">Profil de l'utilisateur</h1>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ Auth::user()->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Email: </strong>{{ Auth::user()->email }}</p>
                        <p class="card-text"><strong>Date d'inscription: </strong>{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        <a href="#" class="btn btn-primary">Modifier le profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('components.footer')
