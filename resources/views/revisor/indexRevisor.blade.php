<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2 class="text-center mt-5">{{__('ui.review_Title')}}</h2>
                <p>{{__('ui.review_Title_Text')}}</p>
            </div>
            @if ($announcement)
                <div class="col-12 col-md-6 py-4 d-flex justify-content-center mt-5">
                    <div class="card card-shadow rounded" style="width: 18rem;">
                        <img src="{{ $announcement->images()->get()->isEmpty() ? 'https://via.placeholder.com/200': $announcement->images()->first()->getUrl(400, 300) }}" class="card-img-top rounded p-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                            <p class=" card-text fst-italic fw-normal">{{__('ui.Announcement_Created')}}
                                {{ $announcement->created_at->format('d/m/Y') }}</p>
                            <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                {{ $announcement->price }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('announcementShow', compact('announcement')) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-info-square-fill text-dark fs-6"></i> Info</a>
                                <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                            </div>
                            <div class="card-footer main-bg text-center mt-5 rounded">
                                <p class="fs-6 fw-normal fst-italic">{{__('ui.Announcement_Seller')}} {{ $announcement->user->name ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 mx-auto my-auto">
                    <h2 class="text-center">{{__('ui.review')}}</h2>
                    <p>{{__('ui.review_Text')}}</p>
                    <div class="my-5 d-flex justify-content-evenly">
                        <form action="{{ route('acceptAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Accetta</button>
                        </form>
                        <form action="{{ route('rejectAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Rifiuta</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-8 mx-auto mt-5 text-center">
                    <h3>{{__('ui.review_Empty')}}</h3>
                    <p>{{__('ui.review_Empty_Text')}}</p>
                </div>
            @endif
            <div class="row justify-content-center w-100 g-0">
                <div class="col-12 d-flex justify-content-center mt-4 mt-xl-2 me-0">
                    <a class="text-decoration-none text-dark btn main-btn fw-semibold me-0 me-md-5 mt-5" href="{{route('rewiewAnnouncements')}}">{{__('ui.last_Review')}}</a>
                </div>
            </div>  
        </div>
    </div>

</x-layout>
