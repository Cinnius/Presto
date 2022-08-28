<x-layout>

    {{-- header --}}
    <header class="container-fluid main-bg ">
        <x-slot name="title">welcome</x-slot>

        {{-- @if (session()->has('message'))
            <div class="col-12 col-md-4 ms-0 ms-5 alert bg-black main-text text-center pt-2">
                {{ session('message') }}
            </div>
        @endif --}}

        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <div class="row justify-content-between align-items-center pt-5 pt-md-2">
            <!-- logo -->
            <div class="col-12 col-md-7 col-xxl-6 d-flex flex-column align-items-center">
                <h1 class="dark-text fw-bold display-1"> Vendilo al più </h1>
                <div class="col-11 col-xl-10 d-flex justify-content-center justify-content-lg-end ms-3 ms-xl-5">
                    <img class="logo-custom img-fluid ps-5" src="image/logo1.png" alt="word Presto">
                </div>
            </div>

            <div class="col-12 col-md-5 col-xxl-6 mb-3 d-flex align-items-center justify-content-center">
                <img class="img-header mx-auto img-fluid" src="image/img1.png" alt="">
            </div>
    </header>

    {{-- searchbar --}}

    {{-- <section class="container-fluid bg-black">
        <div class="container p-0 mx-0">
            <div class="row  justify-content-end align-items-center w-100 bg-black g-0">
                <div class="col-8 col-md-6 me-4 bg-black g-0">
                    @livewire('live-search')

                </div>
                <!-- bottone aggiungi -->
                <div class="col-2 col-md-3">
                    <a href="{{ route('createAnnouncement') }}"
                        class="fw-semibold text-decoration-none w-100 text-center text-dark d-flex ">
                        <i class="bi bi-plus-square-fill main-text fs-2"></i>
                        <span class="hideSpan my-auto ms-3 main-text">Aggiungi</span></a>
                </div>
            </div>
        </div>
    </section> --}}

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
    <section class="container-fluid">
        <div class="row">
            <h2 class="mt-5 text-center fw-semibold mb-3">Ultimi annunci inseriti</h2>
            <div class="swiper mySwiper3 last-ann-swiper">
                <div class="swiper-wrapper">
                    @foreach ($announcements as $announcement)
                        <div class="swiper-slide">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <div class="position-absolute mt-3">
                                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}" class="text-decoration-none text-dark main-bg py-1 px-2 rounded ms-3 ">
                                                <i class="bi bi-bookmark-fill"></i>
                                                {{ $announcement->category->name }}
                                            </a>
                                        </div>
                                        <img src="{{ $announcement->images()->get()->isEmpty() ? 'https://via.placeholder.com/200': $announcement->images()->first()->getUrl(400, 300) }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $announcement->title }}</h3>
                                            <h4 class="card-text">€ {{ $announcement->price }}</h4>
                                            <p class="card-text"><small class="text-muted">Ultimo aggiornamento: {{ $announcement->updated_at->format('d/m/Y') }}</small></p>
                                            <a href="{{ route('announcementShow', compact('announcement')) }}" class="text-decoration-none main-bg text-dark fw-semibold rounded d-flex py-1">
                                                <i class="bi bi-info-square-fill text-dark fs-5 my-auto ms-3"></i>
                                                <p class="my-auto ms-4">Dettagli Prodotto</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    {{-- Section transport and logistics --}}
    <section class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-4 mb-4 mb-md-0 d-flex">
                <div class="serviceHome d-flex me-3">
                    <i class="mx-auto my-auto bi bi-truck fs-2"></i>
                </div>
                <div class="my-auto">
                    <h5>SPEDIZIONE GRATUITA</h5>
                    <h6>Spezione rapida in 3 giorni</h6>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0 d-flex">
                <div class="serviceHome d-flex me-3">
                    <i class="mx-auto my-auto bi bi-telephone-inbound fs-2"></i>
                </div>
                <div class="my-auto">
                    <h5>SERVIZIO CLIENTI 24/7</h5>
                    <h6>Assistenza sempre disponibile</h6>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0 d-flex">
                <div class="serviceHome d-flex me-3">
                    <i class="mx-auto my-auto bi bi-bag-check fs-2"></i>
                </div>
                <div class="my-auto">
                    <h5>I MIGLIORI AFFARI</h5>
                    <h6>Acquista al miglior prezzo</h6>
                </div>
            </div>
        </div>
    </section>


    {{-- Section our team, deliver, ... --}}
    <section class="container-fluid mt-5" id="ourteam">
        <h3 class="text-center fw-semibold">Il nostro team</h3>
        <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
        <div class="row justify-content-center">
            <div class="col-12 col-md-3 py-4 d-flex justify-content-center">
                <div class="card cardFlipPersonalize">
                    <div class="flip-card">
                        <div class="cardInner">
                            <div class="cardFront">
                                <img src="/image/team_01.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="cardBack d-flex justify-content-center align-items-center">
                                <i class="bi bi-twitter px-2"></i>
                                <i class="bi bi-facebook px-2"></i>
                                <i class="bi bi-linkedin px-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center d-flex flex-column justify-content-end borderFooter">
                        <h5>David Williams</h5>
                        <h6>Co-Founder</h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 py-4 d-flex justify-content-center">
                <div class="card cardFlipPersonalize">
                    <div class="flip-card">
                        <div class="cardInner">
                            <div class="cardFront">
                                <img src="/image/team_02.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="cardBack d-flex justify-content-center align-items-center">
                                <i class="bi bi-twitter px-2"></i>
                                <i class="bi bi-facebook px-2"></i>
                                <i class="bi bi-linkedin px-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center d-flex flex-column justify-content-end borderFooter">
                        <h5>Kelly Wagon</h5>
                        <h6>Business manager</h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 py-4 d-flex justify-content-center">
                <div class="card cardFlipPersonalize">
                    <div class="flip-card">
                        <div class="cardInner">
                            <div class="cardFront">
                                <img src="/image/team_03.jpg" class="card-img-top" alt="...">
                            </div>
                            <div class="cardBack d-flex justify-content-center align-items-center">
                                <i class="bi bi-twitter px-2"></i>
                                <i class="bi bi-facebook px-2"></i>
                                <i class="bi bi-linkedin px-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center d-flex flex-column justify-content-end borderFooter">
                        <h5>Mike Taylor</h5>
                        <h6>Account manager</h6>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-md-6">
                <p>Dove consegniamo?</p>
                <p>Vieni a trovarco</p>
                <p>La nostra storia</p> 
            </div> --}}
        </div>
    </section>


</x-layout>
