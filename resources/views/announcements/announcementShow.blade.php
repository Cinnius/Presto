<x-layout>
    {{-- Message --}}
    @if (session()->has('message'))
    <div class="toast show position-fixed bottom-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header main-bg">
            <img src="/image/gruppo_1_logotipo.png" class="toastLogo rounded me-2" alt="...">
            <strong class="me-auto text-dark">Presto.it</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body white-bg">
            {{ session('message') }}
        </div>
    </div>
    @endif
    
    {{-- Announcement --}}
    <div class="container-fluid margin-top">
        <div class="row justify-content-center">
            {{-- Carousel Thumbnail --}}
            <div class="col-1">
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @if ($announcement->images->isNotEmpty())
                        @foreach ($announcement->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ Storage::url($image->path) }}" alt="...">
                        </div>
                        @endforeach
                        @else
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Carousel View --}}
            <div class="col-5">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @if ($announcement->images->isNotEmpty())
                        @foreach ($announcement->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ Storage::url($image->path) }}" alt="...">
                        </div>
                        @endforeach
                        @else
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                        </div>
                        @endif
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            {{-- Description --}}
            <div class="col-5">
                <div class="gradient-custom border border-dark shadow p-3 rounded">
                    <h2>{{ $announcement->title }}</h2>
                    <h6 class="ms-4 my-2">
                        <span
                        class="text-decoration-none text-dark shadow white-bg px-2 rounded me-3">{{ $announcement->category->name }}</span>
                    </h6>
                    {{-- Average Review --}}
                    <div>
                        {{-- Math for Review Average --}}
                        @foreach ($reviews as $review)
                            @if ($review->announcement_id == $announcement->id)
                                @php
                                    $count = $count + 1;
                                    $sum = $sum + $review->vote;
                                @endphp
                            @endif
                        @endforeach
                        @php
                            if($count >0 ){
                                $avg = round(($sum / $count), 1);
                                $avgRounded = round(($sum / $count), 0);
                            } else {
                                $avg =0;
                                $avgRounded = 0;
                            }
                        @endphp
                        {{-- Review Average Display --}}
                        <span class="ms-4">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $avgRounded)
                                    <i class="bi bi-star-fill"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor
                        </span>
                        <span class="ms-2">{{$avg}}</span>
                    </div>
                    {{-- Price and Body Description --}}
                    <hr class="mt-0 mb-3">
                    <h3>€ {{ $announcement->price }}</h3>
                    <p>{{ $announcement->body }}</p>
                    <hr class="mt-0 mb-3">
                    {{-- Other Information --}}
                    <h4>{{ __('ui.announcements_Info') }}</h4>
                    <div>
                        <p class="mt-3 px-2 py-1">{{ __('ui.announcements_Delivery') }}</p>
                    </div>
                    <div>
                        <p class="my-1">{{ __('ui.Announcement_Created') }}
                            {{ $announcement->created_at->format('d/m/Y') }}</p>
                            <p class="my-1">{{ __('ui.Announcement_Updated') }}
                                {{ $announcement->updated_at->format('d/m/Y') }}</p>
                                <p class="my-1">{{ __('ui.Announcement_Seller') }} {{ $announcement->user->name ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
    {{-- Review Form --}}
    @livewire('review-announcement', ['announcement' => $announcement->id])
    {{-- Review Section --}}
    <section class="container mt-3">
        <div class="row flex-column">
            @foreach ($reviews as $review)
                @if ($review->announcement_id == $announcement->id)
                    <div class="card col-12 col-md-5 p-2 p-md-3 my-2 ms-3">
                        <figure class="py-md-3 mb-0">
                        <blockquote class="blockquote">
                            <p class="fs-4 mb-0">{{ $review->user->name }}</p>
                            <p class="fs-6">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->vote)
                                        <i class="bi bi-star-fill main-text"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0">
                            <p class="fs-5 ms-2">{{ $review->review }}</p>
                            <cite class="position-absolute end-0 me-4"> {{ $review->created_at->format('d/m/Y H:i') }}</cite>
                        </figcaption>
                        </figure>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
</x-layout>
            
            