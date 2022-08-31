<x-layout>

    <div class="container-fluid">
        <div class="row margin-custom">
            <div class="col-8 mx-auto">
                <h2 class="text-center mt-5">{{ __('ui.review_Title') }}</h2>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum veniam facere et
                    autem, alias molestiae eveniet voluptates nobis adipisci excepturi nihil corrupti dolor quas earum
                    illum dicta aperiam ea aut?!</p>
            </div>
            @if ($announcement)
            <div class="row w-100">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                    <p class=" card-text fst-italic fw-normal">{{ __('ui.Announcement_Created') }}
                        {{ $announcement->created_at->format('d/m/Y') }}</p>
                    <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                        {{ $announcement->price }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('announcementShow', compact('announcement')) }}"
                            class="text-decoration-none text-dark fw-semibold"><i
                                class="bi bi-info-square-fill text-dark fs-6"></i> Info</a>
                        <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                            class="text-decoration-none text-dark fw-semibold"><i class="bi bi-bookmark-fill"></i>
                            {{ $announcement->category->name }}</a>
                    </div>
                    <div class="card-footer main-bg text-center mt-5 rounded">
                        <p class="fs-6 fw-normal fst-italic">{{ __('ui.Announcement_Seller') }}
                            {{ $announcement->user->name ?? '' }}
                        </p>
                    </div>
                </div>

                <div class="row justify-content-around">
                    @if(count($announcement->images)>0)
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
                </div>
               
                </div>
                <div class="col-4 mx-auto my-auto">
                    <h2 class="text-center">{{ __('ui.review') }}</h2>
                    <p>{{ __('ui.review_Text') }}</p>
                    <div class="my-5 d-flex justify-content-evenly">
                        <form action="{{ route('acceptAnnouncement', ['announcement' => $announcement]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Accetta</button>
                        </form>
                        <form action="{{ route('rejectAnnouncement', ['announcement' => $announcement]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Rifiuta</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-8 mx-auto mt-5 text-center">
                    <h3>{{ __('ui.review_Empty') }}</h3>
                    <p>{{ __('ui.review_Empty_Text') }}</p>
                </div>

            @endif

            <div class="row justify-content-center w-100 g-0">
                <div class="col-12 d-flex justify-content-center mt-4 mt-xl-2 me-0">
                    <a class="text-decoration-none text-dark btn main-btn fw-semibold me-0 me-md-5 mt-5"
                        href="{{ route('rewiewAnnouncements') }}">{{ __('ui.last_Review') }}</a>
                </div>
            </div>
        </div>
    </div>

</x-layout>