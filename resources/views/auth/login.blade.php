<x-layout>



<section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card light-bg text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
                        <form action="{{route('login')}}" method="POST">
                                @csrf
                    <h2 class="fw-bold mb-2 text-uppercase">Accedi</h2>
                    <p class="text-white-50 mb-5">Inserisci la tua email e password!</p>
      
                    <div class="form-outline form-white mb-4">
                            <label class="form-label">Email</label>
                      <input type="email" name="email" class="form-control form-control-lg" />
                    </div>
      
                    <div class="form-outline form-white mb-4">
                            <label class="form-label">Password</label>
                      <input  type="password" name="password" class="form-control form-control-lg" />
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label">ricordami</label>
                        <input type="checkbox" name="remember" class="form-check-input">
                       
                </div>
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
      
                    </form>
      
                  </div>
      
                  <div class="mb-5">
                    <p class="mb-3">Non hai ancora un account?<a href="{{route('register')}}" class="text-white fw-bold">Registrati!</a>
                    </p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-layout>
