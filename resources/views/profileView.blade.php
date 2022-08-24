<x-layout>

    {{-- profile --}}

    <section class="vh-100 white-bg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="pt-5 col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img class="rounded-circle w-50" src="\image\user_placeholder.jpg" alt="Avatar" class="img-fluid my-5">
                                <h5 class="dark-text mt-3 fw-semibold fs-6">{{ Auth::user()->name }}</h5>
                                <p class="dark-text">ruolo: </p>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Informazioni</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">{{ Auth::user()->email }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>

                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Recent</h6>
                                            <p class="text-muted">Lorem ipsum</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Most Viewed</h6>
                                            <p class="text-muted">Dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end me-5">
                                        <a href="#!"><i class="bi bi-facebook text-dark px-2"></i></a>
                                        <a href="#!"><i class="bi bi-twitter text-dark px-2"></i></a>
                                        <a href="#!"><i class="bi bi-instagram text-dark px-2"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">

                                        {{-- logout --}}
                                        <div class="col-6 mb-5">
                                            <a class="text-decoration-none text-dark fs-6 fw-bold"  href="{{ route('logout') }}"
                                                onclick="event.preventDefault() ; document.querySelector('#form-logout').submit();"><i class="bi bi-box-arrow-in-right text-dark me-2"></i>Logout</a>
                                            <form id="form-logout" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>