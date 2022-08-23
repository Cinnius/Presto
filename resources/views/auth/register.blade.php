<x-layout>


    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card light-bg text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <h2 class="fw-bold mb-2 text-uppercase">Registrati</h2>
                                    <p class="text-white-50 mb-5">Inserisci la tua email, username e password!</p>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="name" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Reinserisci la tua password</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-lg" />
                                    </div>


                                    <button class="btn btn-outline-light btn-lg px-5"
                                        type="submit">Registrati!</button>

                                </form>

                            </div>

                            <div class="mb-5">
                                <p class="mb-3">Hai già un account?<a href="{{ route('login') }}"
                                        class="text-white fw-bold">Accedi!</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</x-layout>
