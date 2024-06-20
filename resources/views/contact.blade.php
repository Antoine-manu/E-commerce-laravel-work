@include('components.header')
    <div class="container d-flex flex-row-reverse" style="margin-top: 64px">
        <div class="w-50">
            <span style="font-size: 24px">Contactez-nous</h1>
            <form action="{{ route('contact.submit') }}" class="mt-4" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" style="font-size: 16px" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" style="font-size: 16px" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" style="font-size: 16px" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer votre message</button>
            </form>
        </div>
        <div class="w-50 d-flex align-items-center justify-content-center">
            <img src="{{asset('contact.svg')}}" class="w-75" alt="">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('components.footer')
