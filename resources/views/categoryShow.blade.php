<x-layout>
    <x-slot name="title">Annunci inseriti</x-slot>
    {{-- category zone --}}
    <div class="container-fluid pt-2 py-5 mt-5">
        <div class="row visibilityHide justify-content-around mt-3">
            @foreach ($categories as $category)
                <div class="col-1 my-3  d-flex justify-content-center">
                    <a class="link-costum"href="{{ route('categoryShow', compact('category')) }}">
                        <div class="category-custom text-center @if ($announcements->first()->category_id == $category->id) shadow main-bg @endif">
                            <div class="mt-3">
                                <img src="/{{ $category->icon }}" alt="">
                                <p class="fw-bolder">{{ $category->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- search zone --}}
        <div class="container">
            <div class="row my-3 d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    @livewire('live-search')
                    {{-- @livewire('search-sort', ['categories' =>$categories]) --}}


                </div>
            </div>
        </div>
        <div class="row justify-content-md-around">
            {{-- card zone --}}
            @forelse ($announcements as $announcement)
                <div class="col-12 col-12 col-md-3 py-4 d-flex justify-content-center">
                    <div class="card card-shadow rounded position-relative" style="width: 18rem;">
                        <img src="{{ $announcement->images()->get()->isEmpty()? 'https://via.placeholder.com/200': Storage::url($announcement->images()->first()->path) }}"
                            class="card-img-top rounded p-1" alt="...">
                        <div class="position-absolute end-0 mt-3">
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="text-decoration-none text-dark main-bg py-1 px-2 rounded me-3 "><i
                                    class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                            <p class="card-text fst-italic fw-normal text-truncate">{{ $announcement->body }}</p>
                            <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                {{ $announcement->price }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="fs-6 fw-normal fst-italic my-auto">{{ __('ui.Announcement_Seller') }}
                                    {{ $announcement->user->name ?? '' }}
                                </p>
                                <p class="fs-6 fw-normal fst-italic my-auto">{{ __('ui.Announcement_Created') }}
                                    {{ $announcement->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="card-footer main-bg text-center mt-3 rounded d-flex justify-content-between">
                                <a href="{{ route('announcementShow', compact('announcement')) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-info-square-fill text-dark fs-6"></i>Info</a>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12">
                    <div class="alter alter warning py-3 shadow">
                        <p class="lead">{{ __('ui.index_Empty') }}
                        </p>
                    </div>
                </div>
            @endforelse


            {{-- Page Navigation --}}
            {{-- <div class="col-12 d-flex justify-content-center mb-4">
                {{ $announcements->links() }}
            </div> --}}
        </div>
    </div>
</x-layout>
