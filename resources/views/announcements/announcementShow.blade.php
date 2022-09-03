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

    @livewire('review-announcement', ['announcement' => $announcement->id])
    @foreach ($reviews as $review)
        @if ($review->announcement_id == $announcement->id)
            @php
                $count = $count + 1;
            @endphp
            <p>{{ $review->review }}</p>
            <p>{{ $review->vote }}</p>
            @php
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
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $avgRounded)
                <i class="bi bi-star-fill"></i>
            @else
                <i class="bi bi-star"></i>
            @endif
        @endfor
        {{ $avg }}
</x-layout>
