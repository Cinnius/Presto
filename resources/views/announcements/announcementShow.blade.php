<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            {{-- Carousel Thumbnail --}}
            <div class="col-1">
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @if ($announcement->images->isNotEmpty())
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::url($image->path)}}" alt="...">
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
            <div class="col-4">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @if ($announcement->images->isNotEmpty())
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::url($image->path)}}" alt="...">
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
            <div class="col-4">
                <div class="gradient-custom p-3 rounded">
                    <h2>{{$announcement->title}}</h2>
                    <h6 class="ms-4 my-2">
                        <span class="text-decoration-none text-dark shadow white-bg px-2 rounded me-3">{{$announcement->category->name}}</span>
                    </h6>
                    <hr class="mt-0 mb-3">
                    <h3>€ {{$announcement->price}}</h3>
                    <p>{{$announcement->body}}</p>
                    <hr class="mt-0 mb-3">
                </div>
            </div>
            {{-- Other Information --}}
            <div class="col-2">
                <div>
                    <p class="mt-3 px-2 py-1">{{__('ui.announcements_Delivery')}}</p>
                </div>
                <div class="mt-3 ms-3 light-bg px-3 py-2">
                    <h4>{{__('ui.announcements_Info')}}</h4>
                    <div>
                        <p class="my-1">{{__('ui.nnouncement_Created')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                        <p class="my-1">{{__('ui.nnouncement_Updated')}} {{$announcement->updated_at->format('d/m/Y')}}</p>
                        <p class="my-1">{{__('ui.nnouncement_Seller')}} {{$announcement->user->name ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>