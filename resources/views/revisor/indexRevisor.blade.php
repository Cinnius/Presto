<x-layout>

    <div class="container-fluid">
        <div class="row margin-custom">
            <div class="col-8 mx-auto">
                <h2 class="text-center mt-5">{{ __('ui.review_Title') }}</h2>
                <p class="text-center">{{ __('ui.last_Review1') }}</p>
            </div>
            @if ($announcement)
                <div class="row mx-auto justify-content-md-evenly mt-5">
                    <div class="col-12 col-xl-5 rounded border py-2 shadow">

                        {{-- <div class="row justify-content-around">
                    @if (count($announcement->images) > 0)
                    @foreach ($announcement->images as $image)
                    <div class="col-5 d-flex flex-wrap mb-3 border-dark border rounded">
                        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                            <!-- <div class="card card-shadow rounded" style="width: 18rem;"> -->
                                <img src="{{ $image->getUrl(400, 300) }}" class="img-fluid rounded" alt="...">

                            <!-- </div> -->
                        </div>
                        <div class="col-5 ms-3">
                        <p>Adulti: <span class="{{ $image->adult }}"></span></p>
                        <p>Satira: <span class="{{ $image->spoof }}"></span></p>
                        <p>Medicina: <span class="{{ $image->medical }}"></span></p>
                        <p>Violenza: <span class="{{ $image->violence }}"></span><p>
                        <p>Nudo: <span class="{{ $image->racy }}"></span></p>
                        @if (!empty($image->labels))
                            @foreach ($image->labels as $label)
                                {{ $label }}
                            @endforeach
                        @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                    </div> --}}

                        {{-- Carosello --}}
                        @if (count($announcement->images) > 0)
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                @foreach ($announcement->images as $image)
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $loop->index }}"
                                        class="{{ $loop->first ? 'active' : '' }} visually-hidden" aria-current="true"
                                        aria-label="Slide {{ $loop->index }}"></button>
                                @endforeach
                                <div class="carousel-inner">
                                    @foreach ($announcement->images as $image)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <div class="row">
                                                <div class="col-12 col-md-8">
                                                    <img src="{{ $image->getUrl(400, 300) }}"
                                                        class="d-block w-100 rounded" alt="...">
                                                </div>
                                                <div class="col-12 col-md-4 mt-2 mt-md-0 white-bg">
                                                    <p>{{ __('ui.revisor_Adult') }}: <span class="{{ $image->adult }}"></span></p>
                                                    <p>{{ __('ui.revisor_Spoof') }}: <span class="{{ $image->spoof }}"></span></p>
                                                    <p>{{ __('ui.revisor_Medical') }}: <span class="{{ $image->medical }}"></span></p>
                                                    <p>{{ __('ui.revisor_Violence') }}: <span class="{{ $image->violence }}"></span>
                                                    <p>
                                                    <p>{{ __('ui.revisor_Racy') }}: <span class="{{ $image->racy }}"></span></p>
                                                    @if (!empty($image->labels))
                                                        @foreach ($image->labels as $label)
                                                            {{ $label }}
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <button class="carousel-control-prev control-custom-left" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon position-absolute bottom-0"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next control-custom-right" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon position-absolute bottom-0"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                </div>

                            </div>
                        @endif
                        <div class="card-body d-flex flex-column flex-md-row mt-2 gradient-custom rounded px-3 py-1">
                            <div class="col-12 col-md-6">
                                <h5 class="card-text text-uppercase mt-2">{{ $announcement->title }}</h5>
                                <p class=" card-text fst-italic fw-normal">{{ __('ui.Announcement_Created') }}
                                    {{ $announcement->created_at->format('d/m/Y') }}</p>
                                <p class="fs-6 fw-normal fst-italic">{{ __('ui.Announcement_Seller') }}
                                    {{ $announcement->user->name ?? '' }}
                                </p>
                                <div class="col-12 d-flex flex-row justify-content-between">
                                    <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                        {{ $announcement->price }}
                                    </p>
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                        class="text-decoration-none text-dark fw-semibold me-3"><i
                                            class="bi bi-bookmark-fill"></i>
                                        {{ $announcement->category->name }}</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 px-md-3 py-3 py-md-2 borderstart-custom">
                                <p class="card-text fst-italic fw-normal">{{ __('ui.Announcement_Description') }}: </p>
                                <p class="card-text">{{ $announcement->body }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-xl-4 my-5 my-xl-auto">
                        <h2 class="text-center">{{ __('ui.review') }}</h2>
                        <p class="text-center">{{ __('ui.review_Text') }}</p>
                        <div class="my-5 d-flex justify-content-center">
                            <form action="{{ route('acceptAnnouncement', ['announcement' => $announcement]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="btn btn-success mx-2">{{ __('ui.modify_Visibility_Accepted') }}</button>
                            </form>
                            <form action="{{ route('rejectAnnouncement', ['announcement' => $announcement]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="btn btn-danger mx-2">{{ __('ui.modify_Visibility_Rejected') }}</button>
                            </form>
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-4 mt-xl-2 me-0">
                            <a class="text-decoration-none text-dark btn main-btn fw-semibold mt-5"
                                href="{{ route('rewiewAnnouncements') }}">{{ __('ui.last_Review') }}</a>
                        </div>
                    </div>
                @else
                    <div class="col-8 mx-auto mt-5 text-center">
                        <h3>{{ __('ui.review_Empty') }}</h3>
                        <p>{{ __('ui.review_Empty_Text') }}</p>
                        <a class="text-decoration-none text-dark btn main-btn fw-semibold mt-5"
                                href="{{ route('rewiewAnnouncements') }}">{{ __('ui.last_Review') }}</a>
                    </div>

            @endif


        </div>
    </div>

</x-layout>
