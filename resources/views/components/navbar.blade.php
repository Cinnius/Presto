<nav class="navbar navbar-expand main-bg fixed-nav" aria-label="Second navbar example">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto d-flex justify-content-between w-100">
      <li class="nav-item">
        {{-- Home --}}
        <a class="nav-link nav-btn" aria-current="page" href="{{route('welcome')}}"><i class="bi bi-house-fill fs-1"></i></a>
      </li>
      <li class="nav-item">
        {{-- Index --}}
        <a class="nav-link nav-btn" href="{{route('index')}}"><i class="bi bi-bag-fill fs-1"></i></a>
      </li>
      <li class="nav-item">
        {{-- User --}}
        <a class="nav-link nav-btn" href="#"><i class="bi bi-person-fill fs-1"></i></a>
      </li>
      <li class="nav-item">
        {{-- Menù --}}
        <a class="nav-link nav-btn" data-bs-toggle="offcanvas" href="#NavbarOffcanvas" role="button" aria-controls="NavbarOffcanvas">
          <i class="bi bi-list fs-1"></i>
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
    <h3>Categorie</h3>
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
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