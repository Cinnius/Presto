<div>


    {{-- Sorting Section --}}

    <div class="col-2">
        <div class="col-2 fixed-top bg-danger sorting-Bar">
            <div class="ms-3 my-3">
                <h3>Filtri di Ricerca</h3>
                <div>
                    <h4 class="ms-2">Nome</h4>
                    <div class="form-check">
                        <input wire:click="sortBy('title','asc')" class="form-check-input" type="radio" name="Sorting" id="Name-Asc">
                        <label class="form-check-label" for="Name-Asc">Ordine Crescente</label>
                    </div>
                    <div class="form-check">
                        <input wire:click="sortBy('title','desc')" class="form-check-input" type="radio" name="Sorting" id="Name-Desc">
                        <label class="form-check-label" for="Name-Desc">Ordine Decrescente</label>
                    </div>
                </div>
                <div>
                    <h4 class="ms-2">Prezzo</h4>
                    <div class="form-check">
                        <input wire:click="sortBy('price','asc')" class="form-check-input" type="radio" name="Sorting" id="Price_Asc">
                        <label class="form-check-label" for="Price_Asc">Ordine Crescente</label>
                    </div>
                    <div class="form-check">
                        <input wire:click="sortBy('price','desc')" class="form-check-input" type="radio" name="Sorting" id="Price_Desc">
                        <label class="form-check-label" for="Price_Desc">Ordine Decrescente</label>
                    </div>
                </div>
                <div>
                    <h4 class="ms-2">Data</h4>
                    <div class="form-check">
                        <input wire:click="sortBy('created_at','asc')" class="form-check-input" type="radio" name="Sorting" id="Date_Asc">
                        <label class="form-check-label" for="Date_Asc">Ordine Crescente</label>
                    </div>
                    <div class="form-check">
                        <input wire:click="sortBy('created_at','desc')" class="form-check-input" type="radio" name="Sorting" id="Date_Desc">
                        <label class="form-check-label" for="Date_Desc">Ordine Decrescente</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- search zone --}}

    <div class="container mt-md-5 mt-4">
        <div class="row mt-md-5 d-flex justify-content-center align-items-center">
            <div class="col-md-6 mt-md-5 ">

                <form action="{{ route('searchAnnouncements') }}" method="GET" class="form">
                    <input type="text" class="form-control form-input"
                        placeholder="{{ __('ui.search_Placeholder') }}" wire:model="searchValue" name="searched">
                    <button type="submit" class="border-0 p-0">
                        <span class="left-pan pan-customR "><i class="bi bi-search"></i></span>
                    </button>
                    @if (!empty($searchValue))
                        <div wire:click='resetSearchValue' class="showX">
                            <span wire:click='resetSearchValue'  class=" pan-customL right-pan"><i class="bi bi-x-square-fill text-dark"></i></span>
                        </div>
                </form>
            </div>
        </div>
        <div class="container-fluid ps-0 index-Position">
            <div class="row justify-content-md-around">
                <div class="col-10">
                    <div class="row">
                        @forelse ($announcements as $announcement)
                            <div class="col-12 col-md-4 py-4 d-flex justify-content-center">
                                <div class="card card-shadow rounded position-relative" style="width: 18rem;">
                                    <img src="{{ $announcement->images()->get()->isEmpty()? 'https://via.placeholder.com/200': Storage::url($announcement->images()->first()->path) }}"
                                        class="card-img-top rounded p-1" alt="...">
                                    <div class="position-absolute end-0 mt-3">
                                        <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                            class="text-decoration-none text-dark main-bg py-1 px-2 rounded me-3 "><i
                                                class="bi bi-bookmark-fill"></i>
                                            {{ $announcement->category->name }}</a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                                        <p class="card-text fst-italic fw-normal text-truncate">
                                            {{ $announcement->body }}
                                        </p>
                                        <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                            {{ $announcement->price }}
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <p class="fs-6 fw-normal fst-italic my-auto">
                                                {{ __('ui.Announcement_Seller') }}
                                                {{ $announcement->user->name ?? '' }}
                                            </p>
                                            <p class="fs-6 fw-normal fst-italic my-auto">
                                                {{ __('ui.Announcement_Created') }}
                                                {{ $announcement->created_at->format('d/m/Y') }}
                                            </p>
                                        </div>
                                        <div
                                            class="card-footer main-bg text-center mt-3 rounded d-flex justify-content-between">
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
            </div>
        </div>
    </div>
@else
    <div class="container-fluid ps-0 index-Position">
        <div class="row justify-content-md-around">
            <div class="col-10">
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 py-4 d-flex justify-content-center">
                            <div class="card card-shadow rounded position-relative" style="width: 18rem;">
                                <img src="{{ $announcement->images()->get()->isEmpty()? 'https://via.placeholder.com/200': Storage::url($announcement->images()->first()->path) }}"
                                    class="card-img-top rounded p-1" alt="...">
                                <div class="position-absolute end-0 mt-3">
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                        class="text-decoration-none text-dark main-bg py-1 px-2 rounded me-3 "><i
                                            class="bi bi-bookmark-fill"></i>
                                        {{ $announcement->category->name }}</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                                    <p class="card-text fst-italic fw-normal text-truncate">
                                        {{ $announcement->body }}
                                    </p>
                                    <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                        {{ $announcement->price }}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal fst-italic my-auto">
                                            {{ __('ui.Announcement_Seller') }}
                                            {{ $announcement->user->name ?? '' }}
                                        </p>
                                        <p class="fs-6 fw-normal fst-italic my-auto">
                                            {{ __('ui.Announcement_Created') }}
                                            {{ $announcement->created_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                    <div
                                        class="card-footer main-bg text-center mt-3 rounded d-flex justify-content-between">
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
        </div>
    </div>

@endif


</div>
