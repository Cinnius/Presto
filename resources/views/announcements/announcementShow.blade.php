<x-layout>
    <div class="container">
        <div class="row">
            {{-- Carousel Thumbnail --}}
            <div class="col-1">
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @if ($announcement->images->isNotEmpty())
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide ">
                                    <img src="{{ Storage::url($image->path)}}" class="d-block w-100" alt="...">
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
            <div class="col-7">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @if ($announcement->images->isNotEmpty())
                            @foreach ($announcement->images as $image)
                                <div class="swiper-slide @if($loop->first)active @endif">
                                    <img src="{{ Storage::url($image->path)}}" class="d-block w-100" alt="...">
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
            {{-- Card --}}
            <div class="col-2">
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{$announcement->body}}</p>

                        <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="btn btn-primary">vai a {{$announcement->category->name}}</a>
                        <div class="card-footer">
                            <p>creato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                            <p>ultima modifica: {{$announcement->updated_at->format('d/m/Y')}}</p>
                            <p>inserito da: {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>