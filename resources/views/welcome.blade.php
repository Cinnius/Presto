<x-layout>
    <x-slot name="title">welcome</x-slot>

    @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif

    {{-- header --}}
    <header class="container-fluid main-bg ">
        <div class="row justify-content-between align-items-center pt-5 pt-md-2">
            <!-- logo -->
            <div class="col-12 col-md-7 col-xxl-6 d-flex flex-column align-items-center">
                <h1 class="dark-text fw-bold display-1"> Vendilo al più</h1>
                <div class="col-11 col-xl-10 d-flex justify-content-center justify-content-lg-end ms-3 ms-xl-5">
                    <img class="logo-custom img-fluid ps-5" src="image/logo1.png" alt="word Presto">
                </div>
            </div>

            <div class="col-12 col-md-5 col-xxl-6 mb-3 d-flex align-items-center justify-content-center">
                <img class="img-header mx-auto img-fluid" src="image/img1.png" alt="">
            </div>
    </header>

    {{-- searchbar --}}

    <section class="container-fluid p-0 mx-0">
        <div class="row heightSearch justify-content-end align-items-center w-100 bg-black g-0">
            <div class="col-8 col-md-6 me-4 bg-black g-0">
                <form action="{{ route('searchAnnouncements') }}" method="GET" class="form d-flex">

                    <input type="text" class="form-control form-input" placeholder="cerca un articolo..."
                        name="searched">
                    <button type="submit" class="border-0 p-0">
                        <span class="left-pan"><i class="bi bi-search"></i></span>
                    </button>

                </form>
            </div>
            <!-- bottone aggiungi -->
            <div class="col-2 col-md-3">
                <a href="{{ route('createAnnouncement') }}"
                    class="fw-semibold text-decoration-none w-100 text-center text-dark d-flex ">
                    <i class="bi bi-plus-square-fill main-text fs-2 "></i>
                    <span class="hideSpan my-auto ms-3 main-text">Aggiungi</span></a>
            </div>
        </div>
    </section>






    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif --}}

    {{-- visualizzazione card per ulitmi annunci --}}

    <div class="container-fluid">
        <h2 class="mt-5 text-center fw-semibold mb-3">Ultimi annunci inseriti</h2>
        <div class="row justify-content-md-around">

            @foreach ($announcements as $announcement)
                <div class="col-12 col-12 col-md-3 py-4 d-flex justify-content-center">
                    <div class="card card-shadow rounded position-relative" style="width: 18rem;">
                        <img src="https://via.placeholder.com/200" class="card-img-top rounded p-1" alt="...">
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
            @endforeach

        </div>
    </div>

</x-layout>
