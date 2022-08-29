<x-layout>

    {{-- profile --}}
    <div class="container-fluid py-5 white-bg">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-lg-6 mb-5 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="pt-5 col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img class="rounded-circle w-50" src="\image\user_placeholder.jpg" alt="Avatar"
                                class="img-fluid my-5">
                            <h5 class="dark-text mt-3 fw-semibold fs-6">{{ Auth::user()->name }}</h5>
                            <p class="dark-text">Ruolo:
                                @if (Auth::user()->is_revisor)
                                    Revisore
                                @else
                                    Utente
                                @endif
                            </p>
                            @if (Auth::user()->is_revisor)
                        <div class="col-12">
                            <a href="{{ route('indexRevisor') }}" type="button"
                                class="btn position-relative main-btn my-4">
                                <p class="my-auto">Revisiona gli Articoli</p>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </div>
                    @endif
                            <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Informazioni</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Username</h6>
                                        <p class="text-muted">{{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
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
                                        <a class="text-decoration-none text-dark fs-6 fw-bold"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault() ; document.querySelector('#form-logout').submit();"><i
                                                class="bi bi-box-arrow-in-right text-dark me-2"></i>Logout</a>
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

    <section class="container">
        <div class="row justify-content-md-around mt-5">
            <h2>I tuoi annunci</h2>
            @forelse ($announcements as $announcement)
                <div class="col-12 col-12 col-md-3 py-4 d-flex justify-content-center">
                    <div class="card card-shadow rounded position-relative" style="width: 18rem;">
                        <img src="{{ $announcement->images()->get()->isEmpty()? 'https://via.placeholder.com/200': Storage::url($announcement->images()->first()->path) }}"
                            class="card-img-top rounded p-1" alt="...">
                        <div class="position-absolute end-0 mt-3">
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="text-decoration-none text-dark main-bg py-1 px-2 rounded me-3 "><i
                                    class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                            <p class="card-text fst-italic fw-normal text-truncate">{{ $announcement->body }}</p>
                            <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                {{ $announcement->price }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="fs-6 fw-normal fst-italic my-auto">Venduto da:
                                    {{ $announcement->user->name ?? '' }}
                                </p>
                                <p class="fs-6 fw-normal fst-italic my-auto">Creato il:
                                    {{ $announcement->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="card-footer main-bg text-center mt-3 rounded d-flex justify-content-between">
                                <a href="{{ route('announcementShow', compact('announcement')) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-info-square-fill text-dark fs-6"></i> Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                        <h4>Non hai ancora creato nessun annuncio</h4>
                        <a href="{{ route('createAnnouncement') }}">Crea il tuo primo annuncio!</a>
                    </div>
                @endforelse


            </div>
        </section>

    </x-layout>
