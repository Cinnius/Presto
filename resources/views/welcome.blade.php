<x-layout>

    {{-- Searchbar home da piccoli schermi --}}
    <div class="container-fluid main-bg hideIcon searchbar-little">
        <div class="row">
            <div class="col-12 position-absolute top-0 w-75 py-2">
                @livewire('live-search')
            </div>
            <!-- bottone aggiungi -->
            <div class="col-2 mx-auto mt-4 position-absolute end-0">
                <a href="{{ route('createAnnouncement') }}"
                    class="fw-semibold text-decoration-none mx-auto text-dark d-flex">
                    <i class="bi bi-plus-square-fill dark-text"></i></a>
            </div>
        </div>
    </div>

    {{-- header --}}
    <header class="container-fluid main-bg">
        <x-slot name="title">Welcome</x-slot>

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
                <h1 class="dark-text fw-bold display-1"> {{__('ui.slogan')}} </h1>
                <div class="col-11 col-xl-10 d-flex justify-content-center justify-content-lg-end ms-3 ms-xl-5">
                    <img class="logo-custom img-fluid ps-5" src="image/logo1.png" alt="word Presto">
                </div>
            </div>

            <div class="col-12 col-md-5 col-xxl-6 mb-3 d-flex align-items-center justify-content-center">
                <img class="img-header mx-auto img-fluid" src="image/social1.png" alt="">
            </div>
    </header>



    {{-- visualizzazione card per ulitmi annunci --}}
    <section class="container-fluid">
        <div class="row">
            <h2 class="mt-5 text-center fw-semibold mb-3">{{__('ui.last_Added_Announcement')}}</h2>
            <div class="swiper mySwiper3 last-ann-swiper">
                <div class="swiper-wrapper">
                    @foreach ($announcements as $announcement)
                        <div class="swiper-slide">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <div class="position-absolute mt-3">
                                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                                class="text-decoration-none text-dark main-bg py-1 px-2 rounded ms-3 ">
                                                <i class="bi bi-bookmark-fill"></i>
                                                {{ $announcement->category->name }}
                                            </a>
                                        </div>
                                        <img src="{{ $announcement->images()->get()->isEmpty()? 'https://via.placeholder.com/200': $announcement->images()->first()->getUrl(400, 300) }}"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $announcement->title }}</h3>
                                            <h4 class="card-text">€ {{ $announcement->price }}</h4>
                                            <p class="card-text"><small class="text-muted">{{__('ui.last_Update')}}
                                                    {{ $announcement->updated_at->format('d/m/Y') }}</small></p>
                                            <a href="{{ route('announcementShow', compact('announcement')) }}"
                                                class="text-decoration-none main-bg text-dark fw-semibold rounded d-flex py-1">
                                                <i class="bi bi-info-square-fill text-dark fs-5 my-auto ms-3"></i>
                                                <p class="my-auto ms-4">{{__('ui.detail_Product')}}</p>
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
                    <h5>{{__('ui.gratis_Shipment')}}</h5>
                    <h6>{{__('ui.gratis_Shipment_Text')}}</h6>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0 d-flex">
                <div class="serviceHome d-flex me-3">
                    <i class="mx-auto my-auto bi bi-telephone-inbound fs-2"></i>
                </div>
                <div class="my-auto">
                    <h5>{{__('ui.client_Service')}}</h5>
                    <h6>{{__('ui.client_Service_Text')}}</h6>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0 d-flex">
                <div class="serviceHome d-flex me-3">
                    <i class="mx-auto my-auto bi bi-bag-check fs-2"></i>
                </div>
                <div class="my-auto">
                    <h5>{{__('ui.best_Deals')}}</h5>
                    <h6>{{__('ui.best_Deals_Text')}}</h6>
                </div>
            </div>
        </div>
    </section>


    {{-- Section countdown --}}
    <section class="container height-countdown mt-5 py-lg-5">
        <div class="row h-100 flex-md-column align-content-md-center">
            <div class="col-12 col-md-5 me-lg-5 order-2 order-md-1">
                <img src="/image/car.png" class="img-fluid rounded border shadow" alt="">
            </div>
            <div class="col-12 col-lg-4 text-center py-3 order-1 order-md-2">
                <span class="fs-1 fw-bold">BEST <img src="/image/logo.png" class="img-fluid CustomLogo"
                        alt="">FFER</span>
                <h6 class="mt-2">{{__('ui.time_Deals')}}</h6>
                <h6>{{__('ui.time_Deals_Text')}}</h6>
            </div>
            <div class="col-12 col-lg-6 d-flex fs-6 fs-lg-5 mb-2 mb-lg-0 order-1 order-md-2">
                <div class="col-3 col-xl-2 border border-dark rounded me-lg-2 gradient-custom border-opacity-25">
                    <p class="text-center mt-2" id="countdown1"></p>
                    <p class="text-dark h-100 text-center">{{__('ui.time_Deals_Text_D')}}</p>
                </div>
                <div class="col-3 col-xl-2 border border-dark rounded me-lg-2 gradient-custom border-opacity-25">
                    <p class="text-center mt-2" id="countdown2"></p>
                    <p class="text-dark h-100 text-center">{{__('ui.time_Deals_Text_H')}}</p>
                </div>
                <div class="col-3 col-xl-2 border border-dark rounded me-lg-2 gradient-custom border-opacity-25">
                    <p class="text-center mt-2" id="countdown3"></p>
                    <p class="text-dark h-100 text-center">{{__('ui.time_Deals_Text_M')}}</p>
                </div>
                <div class="col-3 col-xl-2 border border-dark rounded gradient-custom border-opacity-25">
                    <p class="text-center mt-2" id="countdown4"></p>
                    <p class="text-dark h-100 text-center">{{__('ui.time_Deals_Text_S')}}</p>
                </div>
            </div>
        </div>
    </section>


    {{-- Section our team, deliver, ... --}}
    <section class="container-fluid mt-5 pt-5" id="ourteam">
        <h3 class="text-center fw-semibold">{{__('ui.our_Teams')}}</h3>
        <p class="text-center">{{__('ui.our_Teams_Text')}}</p>
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
