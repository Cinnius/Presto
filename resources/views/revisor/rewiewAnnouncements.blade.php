<x-layout>

    <div class="container-fluid">
        <div class="row text-center margin-custom">
            <div class="col-8 mx-auto mt-5">
                <h2>{{__('ui.last_Review_Title')}}</h2>
            </div>
        </div>
        <div class="row justify-content-md-around">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-12 col-md-3 py-4 d-flex justify-content-center">
                    <div class="card card-shadow rounded position-relative" style="width: 18rem;">
                        <img src="https://via.placeholder.com/200" class="card-img-top rounded p-1" alt="...">
                        <div class="position-absolute end-0 mt-3">
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="text-decoration-none text-dark main-bg py-1 px-2 rounded me-3 "><i
                                    class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                        </div>
                        <div class="position-absolute mt-3">
                            <p class="text-decoration-none text-dark fst-italic main-bg px-2 rounded ms-3">
                                @if ($announcement->is_accepted)
                                    {{__('ui.last_Review_Accepted')}}
                                @else
                                    {{__('ui.last_Review_Rejected')}}
                                    @endif
                            </p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                            <p class="card-text fst-italic fw-normal text-truncate">{{ $announcement->body }}
                            </p>
                            <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                {{ $announcement->price }}</p>
                            <div class="d-flex justify-content-between">
                                <p class="fs-6 fw-normal fst-italic my-auto">{{__('ui.Announcement_Seller')}} 
                                    {{ $announcement->user->name ?? '' }}</p>
                                <p class="fs-6 fw-normal fst-italic my-auto">{{__('ui.Announcement_Created')}} 
                                    {{ $announcement->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="card-footer main-bg text-center mt-3 rounded d-flex justify-content-between">
                                <a href="{{ route('announcementShow', compact('announcement')) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-info-square-fill text-dark fs-6"></i>Info</a>
                            </div>
                            <div class="mt-3 text-center">
                                <p>{{__('ui.modify_Visibility')}}</p>
                                @if($announcement-> is_accepted)
                                <form action="{{ route('rejectAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn main-btn fst-italic fw-semibold">{{__('ui.modify_Visibility_Rejected')}}</button>
                                </form>
                                @else
                                <form action="{{ route('acceptAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn main-btn fst-italic fw-semibold">{{__('ui.modify_Visibility_Accepted')}}</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alter alter warning py-3 shadow">
                        <p class="lead">{{__('ui.last_Review_Empty')}}</p>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
   
</x-layout>
