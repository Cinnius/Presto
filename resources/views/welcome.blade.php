<x-layout>
    
    <div class="container-fluid mt-2">
        
        {{-- header --}}
        <div class="row justify-content-between align-items-center">
            <div class="col-10 col-lg-8">
                <h1 class="dark-text fw-bold display-1 ms-lg-5">Presto.it</h1>
            </div>
            <div class="col-2 col-lg-4 mb-3">
                <a href="{{ route('createAnnouncement') }}"
                class="fw-semibold text-decoration-none w-100 text-center text-dark d-flex">
                <i class="bi bi-plus-square-fill text-dark fs-2"></i>
                <span class="hideSpan my-auto ms-3">Aggiungi</span></a>
            </div>
        </div>
        
        
        {{-- searchbar --}}
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <form action="{{route('searchAnnouncements')}}" method="GET">
                    <div class="d-flex">
                        <input type="text" class="form-control form-input" placeholder="cerca un articolo..." name="searched">
                        <button  type="submit"><span class="left-pan"><i class="bi bi-search"> </i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <x-slot name="title">welcome</x-slot>
    @if (session()->has('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif
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
                                    {{ $announcement->price }}</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal fst-italic my-auto">Venduto da:
                                            {{ $announcement->user->name ?? '' }}</p>
                                            <p class="fs-6 fw-normal fst-italic my-auto">Creato il:
                                                {{ $announcement->created_at->format('d/m/Y') }}</p>
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
                    