<nav class="navbar navbar-expand main-bg fixed-nav custom-nav" aria-label="Second navbar example">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto d-flex justify-content-between justify-content-lg-center w-100">
            <li class="nav-item px-md-3">
                {{-- Home --}}
                <a class="nav-link nav-btn" aria-current="page" href="{{ route('welcome') }}">
                    <i class="bi bi-house-fill fs-1 hideIcon hideIcon"></i><span class="hideSpan">Home</span>
                </a>
            </li>
            <li class="nav-item px-md-3">
                {{-- Index --}}
                <a class="nav-link nav-btn link-dot d-flex align-items-end justify-content-center nav-trans" href="{{ route('index') }}"><i class="bi bi-bag-fill fs-1 hideIcon"></i>
                    <span class="hideSpan">Index</span>
                </a>
            </li>
  
            <li class="nav-item px-md-3">
                {{-- User --}}
                @guest
                <a class="nav-link nav-btn link-dot d-flex align-items-end justify-content-center nav-trans" href="{{route('login')}}">
                    <i class="bi bi-person-fill fs-1 hideIcon"></i><span class="hideSpan">Login</span>
                </a>
                @else
                <a class="nav-link nav-btn link-dot d-flex align-items-end justify-content-center nav-trans" href="{{route('profileView')}}"><i class="bi bi-person-fill fs-1 hideIcon">
                    </i><span class="hideSpan">{{Auth::user()->name}}</span>
                </a>
                @endguest
            </li>
            <li class="nav-item px-md-3">
                {{-- Menù --}}
                <a class="nav-link nav-btn link-dot d-flex align-items-end justify-content-center nav-trans" data-bs-toggle="offcanvas" href="#NavbarOffcanvas" role="button"
                    aria-controls="NavbarOffcanvas">
                    <i class="bi bi-list fs-1 hideIcon"></i><span class="hideSpan">Menù</span>
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
                    <a href="{{ route('createAnnouncement') }}" class="btn position-relative main-btn">
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
                                <img src="{{$category->icon}}" alt="">
                                <p class="fw-bolder">{{ $category->name}}</p>
                            </div>
                        </div>
                    </a>
                        {{-- <i class="bi bi-pc-display-horizontal"></i> --}}
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- @guest
            <li><a class="dropdown-item" href="{{route('register')}}">register</a></li>
            <li><a class="dropdown-item" href="{{route('login')}}">login</a></li>
            <li><hr class="dropdown-divider"></li>
            @else
            <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
            <li><a class="dropdown-item" href="{{route('createAnnouncement')}}">Aggiungi annuncio</a></li>
            <li class="nav-item">
                  <a class="nav-link text-danger" href="{{route('logout')}}" onclick="event.preventDefault() ; document.querySelector('#form-logout').submit();">Logout</a>
                  <form id="form-logout" action="{{ route('logout')}}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
            @endguest --}}
