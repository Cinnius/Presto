<nav class="navbar navbar-expand navhome-bg fixed-nav custom-nav" aria-label="Second navbar example">
    <div class="container-fluid">
        <ul class="navbar-nav mx-auto my-auto d-flex justify-content-around justify-content-md-start align-items-center w-100 textNav">
            {{-- Logo --}}
            <a class="navbar-brand hideLogo" href="">
                <img src="image/gruppo_1_logotipo.png" class="CustomLogo ms-5" alt="Logo of site">
            </a>
            <li class="nav-item px-md-3 order-1 order-md-1">
                {{-- Home --}}
                <a class="nav-link nav-btn" aria-current="page" href="{{ route('welcome') }}">
                    <i class="bi bi-house-fill fs-1 hideIcon"></i><span class="hideSpan">Home</span>
                </a>
            </li>
            <li class="nav-item px-md-3 order-2 order-md-2">
                {{-- Index --}}
                <a class="nav-link nav-btn" href="{{ route('index') }}"><i class="bi bi-bag-fill fs-1 hideIcon"></i>
                    <span class="hideSpan">Index</span>
                </a>
            </li>

            {{-- Searchbar - navbarhome --}}
            <li class="nav-item px-md-3 order-4 my-auto w-75 justify-content-end">
                <div class="col-9 col-xxl-8 position-absolute top-0 w-25">
                    @livewire('live-search')
                </div>
                <!-- bottone aggiungi -->
                <div class="col-2 mx-auto px-5 px-xxl-0">
                    <a href="{{ route('createAnnouncement') }}" class="fw-semibold text-decoration-none mx-auto text-dark d-flex">
                        <i class="bi bi-plus-square-fill dark-text"></i>
                        <span class="hideSpan my-auto ms-3 dark-text">Aggiungi</span></a>
                </div>
            </li>
            <li class="nav-item px-md-3 py-0 order-3 order-md-5 userWidth">


                {{-- User --}}
                @guest
                    <a class="nav-link nav-btn d-flex justify-content-md-end align-items-center" href="{{ route('login') }}">
                        <i class="bi bi-person-fill fs-3 hideIcon2 me-md-2"></i>
                        <i class="bi bi-person-fill fs-1 hideIcon"></i>
                        <span class="hideSpan me-5">Login</span>
                    </a>
                @else
                    <a class="nav-link nav-btn d-flex justify-content-md-end align-items-center" href="{{ route('profileView') }}">
                        {{-- <i class="bi bi-person-fill fs-3 hideIcon2 me-md-2"></i> --}}
                        <i class="bi bi-person-fill fs-1 hideIcon"></i>
                        <span class="hideSpan userName userHeight me-5">
                            <p class="my-auto ps-2">{{ Auth::user()->name }}</p>
                            <i class="bi bi-person-fill userIcon-height fs-1"></i>
                        </span>
                    </a>
                @endguest
            </li>

            <li class="nav-item px-md-3 order-4 order-md-3">
                {{-- Menù --}}
                <a class="nav-link nav-btn" data-bs-toggle="offcanvas" href="#NavbarOffcanvas" role="button"
                    aria-controls="NavbarOffcanvas">
                    <i class="bi bi-list fs-1 hideIcon"></i>
                    <span class="hideSpan">Menù</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

{{-- Off Canvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="NavbarOffcanvas" aria-labelledby="NavbarOffcanvasLabel">
    <div class="offcanvas-header">
        <div>
            <a href=""><i class="bi bi-gear-fill fs-2 dark-text mx-2"></i></a>
            <a href=""><i class="bi bi-palette-fill fs-2 dark-text mx-3"></i></a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h2 class="text-end">Presto.it</h2>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('createAnnouncement') }}" class="btn position-relative main-btn my-5">
                        <p class="my-auto">Aggiungi un Articolo</p>
                    </a>
                </div>
                @guest
                @else
                    @if (Auth::user()->is_revisor)
                        <div class="col-12">
                            <a href="{{ route('indexRevisor') }}" type="button" class="btn position-relative main-btn my-4">
                                <p class="my-auto">Revisiona gli Articoli</p>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </div>
                    @endif
                @endguest
            </div>
        </div>
        <h3 class="fw-bold">Categorie</h3>
        <div class="col-12 d-flex flex-wrap">
            {{-- <ul class="ul-custom"> --}}

            @foreach ($categories as $category)
                <div class="col-6 my-3 d-flex justify-content-center">
                    <a class="link-costum"href="{{ route('categoryShow', compact('category')) }}">
                        <div class="category-custom text-center">
                            <div class="mt-3">
                                <img src="{{ $category->icon }}" alt="">
                                <p class="fw-bolder">{{ $category->name }}</p>
                            </div>
                        </div>
                    </a>
                    {{-- <i class="bi bi-pc-display-horizontal"></i> --}}
                </div>
            @endforeach
        </div>
    </div>
</div>
