<x-layout>

    <div class="container-fluid mt-3">

        {{-- header --}}
        <div class="row justify-content-between align-items-center">
            <div class="col-10">
                <h1 class="dark-text fw-bold display-1">Presto.it</h1>
            </div>
            <div class="col-2 mb-3">
                <a href="{{ route('createAnnouncement') }}"><i class="bi bi-plus-square-fill text-dark fs-2"></i></a>
            </div>
        </div>


        {{-- searchbar --}}
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="form">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control form-input" placeholder="cerca un articolo...">
                    <span class="left-pan"><i class="bi bi-search"></i></span>
                </div>

            </div>
        </div>
    </div>


    <x-slot name="title">welcome</x-slot>
    @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif

    {{-- visualizzazione card per ulitmi annunci --}}

    <div class="container-fluid">
        <div class="row justify-content-md-around">

            @foreach ($announcements as $announcement)
                <div class="col-12 col-12 col-md-3 py-4 d-flex justify-content-center">
                    <div class="card card-shadow rounded" style="width: 18rem;">
                        <img src="https://via.placeholder.com/200" class="card-img-top rounded p-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                            <p class="card-text fst-italic fw-normal text-truncate">{{ $announcement->body }}</p>
                            <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> € {{ $announcement->price }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('announcementShow', compact('announcement')) }}" class="text-decoration-none text-dark fw-semibold"><i class="bi bi-info-square-fill text-dark fs-6"></i> Info</a>
                                <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}" class="text-decoration-none text-dark fw-semibold"><i class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                            </div>
                            <div class="card-footer main-bg text-center mt-5 rounded">                               
                                <p class="fs-6 fw-normal fst-italic">Venditore: {{ $announcement->user->name ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</x-layout>
