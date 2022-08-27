<x-layout>



    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card light-bg text-dark gradient-custom" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <h2 class="fw-bold mb-2 text-uppercase">Accedi</h2>
                                    <p class="text-dark-50 mb-5">Inserisci la tua email e password!</p>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                                        @error('email')
                                            <div class="mx-auto text-center rounded px-2 py-1 mt-1 mx-0 fw-semibold message-custom bg-dark main-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                        @error('password')
                                            <div class="mx-auto text-center rounded px-2 py-1 mt-1 mx-0 fw-semibold message-custom bg-dark main-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check-label">Ricordami</label>
                                        <input type="checkbox" name="remember" class="form-check-input">

                                    </div>

                                    <button class="btn btn-outline-dark btn-lg px-5" type="submit">Login</button>

                                </form>

                            </div>

                            <div class="mb-5">
                                <p class="mb-3">Non hai ancora un account?
                                <a href="{{ route('register') }}" class="text-dark fw-bold">Registrati!</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
