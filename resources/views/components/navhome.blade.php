<nav class="navbar navbar-expand navhome-bg fixed-nav custom-nav position-fixed" aria-label="Second navbar example">
    <div class="container-fluid">
        <ul
            class="navbar-nav my-auto d-flex justify-content-around justify-content-md-start align-items-center w-100 textNav">
            {{-- Logo --}}
            <a class="navbar-brand hideLogo nav-trans ms-3 me-5" href="{{ route('welcome') }}">
                <img src="/image/gruppo_1_logotipo.png" class="CustomLogo" alt="Logo of site">
            </a>
            <li class="nav-item px-md-3 order-1 order-xxl-1 position-relative margin-navbar">
                {{-- Home --}}
                <a class="nav-link nav-btn link-dot d-flex align-items-end justify-content-center nav-trans"
                    aria-current="page" href="{{ route('welcome') }}">
                    <i class="bi bi-house-fill fs-1 hideIcon"></i><span class="hideSpan">Home</span>
                </a>
                {{-- <div class="dot"></div> --}}
            </li>
            <li class="nav-item px-md-3 order-2 order-md-1 order-xxl-2">
                {{-- Index --}}
                <a class="nav-link nav-btn nav-trans link-dot d-flex  justify-content-center"
                    href="{{ route('index') }}"><i class="bi bi-bag-fill fs-1 hideIcon"></i>
                    <span class="hideSpan">{{ __('ui.nav_Index') }}</span>
                </a>
            </li>

            {{-- Searchbar - navbarhome da grandi schermi --}}
            <li class="nav-item order-4  hideSpan order-xxl-6">
                <div class="col-9 col-xxl-8 search-custom w-25">
                    @livewire('live-search')
                </div>
            </li>
            <!-- bottone aggiungi -->
            <li class="hideSpan">
                <a href="{{ route('createAnnouncement') }}"
                    class="fw-semibold text-decoration-none mx-auto text-dark d-flex nav-trans">
                    <i class="bi bi-plus-square-fill dark-text"></i>
                    <span class="my-auto ms-3 dark-text hideicon addSpan">{{ __('ui.create_Add_Announcements') }}</span></a>
            </li>


            {{-- User --}}
            <li class="nav-item px-md-3 py-0 order-3 order-md-3 order-xxl-5 d-flex ">
                @guest
                    <a class="nav-link nav-btn nav-trans link-dot d-flex justify-content-center"
                        href="{{ route('login') }}">
                        <i class="bi bi-person-fill fs-3 hideIcon2 me-md-2"></i>
                        <i class="bi bi-person-fill fs-1 hideIcon "></i>
                        <span class="hideSpan me-5">Login</span>
                    </a>
                @else
                    <a class="nav-link nav-btn d-flex  align-items-end nav-trans  d-flex align-items-end justify-content-md-center link-dot"
                        href="{{ route('profileView') }}">
                        {{-- <i class="bi bi-person-fill fs-3 hideIcon2 me-md-2"></i> --}}
                        <i class="bi bi-person-fill fs-1 hideIcon"></i>
                        <span class="hideSpan userName userHeight me-5">
                            <p class="my-auto ps-2">{{ Auth::user()->name }}</p>
                            <i class="bi bi-person-fill userIcon-height fs-2 mt-1"></i>
                        </span>
                    </a>
                @endguest
            </li>

            <li class="nav-item px-md-3 order-4 order-md-2 order-xxl-3">
                {{-- Menù --}}
                <a class="nav-link nav-btn nav-trans" data-bs-toggle="offcanvas" href="#NavbarOffcanvas" role="button"
                    aria-controls="NavbarOffcanvas">
                    <i class="bi bi-list fs-1 hideIcon"></i>
                    <span class="hideSpan">Menù</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

{{-- Off Canvas --}}
<div class="offcanvas offcanvas-end white-bg" tabindex="-1" id="NavbarOffcanvas"
    aria-labelledby="NavbarOffcanvasLabel">
    <div class="offcanvas-header">
        <div class="d-flex">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-gear-fill fs-2 dark-text mx-2"></i></a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li class="dropdown-item d-flex">
                    <x-_locale lang="it" nation="it">Italiano</x-_locale>
                </li>
                <li class="dropdown-item d-flex">
                    <x-_locale lang="en" nation="gb">English</x-_locale>
                </li>
                <li class="dropdown-item d-flex">
                    <x-_locale lang="es" nation="es">Español</x-_locale>
                </li>
            </ul>
            <a href=""><i class="bi bi-palette-fill fs-2 dark-text mx-3"></i></a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h2 class="text-end">Presto.it</h2>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('createAnnouncement') }}" class="btn position-relative main-btn">
                        <p class="my-auto">{{ __('ui.create_Add_Announcements') }}</p>
                    </a>
                </div>
                @guest
                @else
                    @if (Auth::user()->is_revisor)
                        <div class="col-12">
                            <a href="{{ route('indexRevisor') }}" type="button"
                                class="btn position-relative main-btn my-4">
                                <p class="my-auto">{{ __('ui.nav_Review') }}</p>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </div>
                    @endif
                @endguest
            </div>
        </div>
        <h3 class="fw-bold">{{ __('ui.nav_Categories') }}</h3>
        <div class="col-12 d-flex flex-wrap">
            {{-- <ul class="ul-custom"> --}}

            @foreach ($categories as $category)
                <div class="col-6 my-3 d-flex justify-content-center">
                    <a class="link-costum"href="{{ route('categoryShow', compact('category')) }}">
                        <div class="category-custom text-center">
                            <div class="mt-3">
                                <img src="/{{ $category->icon }}" alt="">
                                <p class="fw-bolder">{{ $category->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
