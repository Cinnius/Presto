<div>
    {{-- Sorting Section --}}

    <div class="container hideSortSmall">
        <div class="row">
            <div class="col-12 fixed-top sorting-Bar d-flex align-items-center">
                <select class="form-select" aria-label="Default select example" wire:model="categorySearch"
                    style="width: 12vw;height:40px">
                    <option selected>Seleziona la categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="ms-3 my-3 d-flex align-items-center justify-content-center">
                    <p class="ms-5 me-2 my-auto">Nome</p>
                    <div class="form-check mx-2">
                        <input wire:click="sortBy('title','asc')" class="form-check-input" type="radio" name="Sorting"
                            id="Name-Asc">
                        <label class="form-check-label" for="Name-Asc">Crescente</label>
                    </div>
                    <div class="form-check mx-2">
                        <input wire:click="sortBy('title','desc')" class="form-check-input" type="radio"
                            name="Sorting" id="Name-Desc">
                        <label class="form-check-label" for="Name-Desc">Decrescente</label>
                    </div>
                    <p class="ms-5 me-2 my-auto">Prezzo</p>
                    <div class="form-check mx-2">
                        <input wire:click="sortBy('price','asc')" class="form-check-input" type="radio" name="Sorting"
                            id="Price_Asc">
                        <label class="form-check-label" for="Price_Asc">Crescente</label>
                    </div>
                    <div class="form-check mx-2">
                        <input wire:click="sortBy('price','desc')" class="form-check-input" type="radio"
                            name="Sorting" id="Price_Desc">
                        <label class="form-check-label" for="Price_Desc">Decrescente</label>
                    </div>
                    <p class="ms-5 me-2 my-auto">Data</p>
                    <div class="form-check mx-2">
                        <input wire:click="sortBy('created_at','asc')" class="form-check-input" type="radio"
                            name="Sorting" id="Date_Asc">
                        <label class="form-check-label" for="Date_Asc">Crescente</label>
                    </div>
                    <div class="form-check mx-2">
                        <input wire:click="sortBy('created_at','desc')" class="form-check-input" type="radio"
                            name="Sorting" id="Date_Desc">
                        <label class="form-check-label" for="Date_Desc">Decrescente</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sort-bar from small screen --}}
    <div class="container hideSortBig">
        <div class="row">
            <div class="col-12 sorting-Bar d-flex justify-content-center align-items-center">
                <select class="form-select w-75" aria-label="Default select example" wire:model="categorySearch"
                    style="width: 12vw;height:40px">
                    <option selected>Seleziona la categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-3 d-flex align-items-center justify-content-center">
                <p class="ms-2 me-2 my-auto">Nome</p>
                <div class="form-check mx-2">
                    <input wire:click="sortBy('title','asc')" class="form-check-input" type="radio" name="Sorting"
                        id="Name-Asc">
                    <label class="form-check-label" for="Name-Asc">Crescente</label>
                </div>
                <div class="form-check mx-2">
                    <input wire:click="sortBy('title','desc')" class="form-check-input" type="radio" name="Sorting"
                        id="Name-Desc">
                    <label class="form-check-label" for="Name-Desc">Decrescente</label>
                </div>
            </div>
            <div class="my-3 d-flex align-items-center justify-content-center">
                <p class="ms-2 me-1 my-auto">Prezzo</p>
                <div class="form-check mx-2">
                    <input wire:click="sortBy('price','asc')" class="form-check-input" type="radio" name="Sorting"
                        id="Price_Asc">
                    <label class="form-check-label" for="Price_Asc">Crescente</label>
                </div>
                <div class="form-check mx-2">
                    <input wire:click="sortBy('price','desc')" class="form-check-input" type="radio" name="Sorting"
                        id="Price_Desc">
                    <label class="form-check-label" for="Price_Desc">Decrescente</label>
                </div>
            </div>
            <div class="my-3 d-flex align-items-center justify-content-center">
                <p class="ms-2 me-3 my-auto">Data</p>
                <div class="form-check mx-2">
                    <input wire:click="sortBy('created_at','asc')" class="form-check-input" type="radio"
                        name="Sorting" id="Date_Asc">
                    <label class="form-check-label" for="Date_Asc">Crescente</label>
                </div>
                <div class="form-check mx-2">
                    <input wire:click="sortBy('created_at','desc')" class="form-check-input" type="radio"
                        name="Sorting" id="Date_Desc">
                    <label class="form-check-label" for="Date_Desc">Decrescente</label>
                </div>
            </div>
        </div>
    </div>





    {{-- search zone --}}
    <div class="container index-Position">
        <div class="row mt-xxl-5">
            <div class="col-12 mt-xl-5 d-flex flex-column align-items-center">
                {{-- Search Bar --}}
                <div class="col-12 col-md-6 position-relative">
                    <input type="text" class="form-control form-input"
                        placeholder="{{ __('ui.search_Placeholder') }}" wire:model="searchValue">
                    {{-- Search BTN --}}
                    <button type="submit" class="border-0 p-0">
                        <span class="sort-Search-Position"><i class="bi bi-search"></i></span>
                    </button>
                </div>
                @if (!empty($searchValue))
                    <div wire:click='resetSearchValue' class="showX position-relative">
                        {{-- Clear BTN --}}
                        <span wire:click='resetSearchValue' class="sort-Clear-Position"><i
                                class="bi bi-x-square-fill text-dark"></i></span>
                    </div>
            </div>
            @endif
            {{-- Card Search Announcement --}}
            <div class="col-12">
                <div class="row">
                    @forelse ($announcements as $announcement)
                        <div wire:loading.class="opacity-75"
                            class="col-12 col-md-4 py-4 d-flex justify-content-center">
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
                                </div>
                                <div
                                    class="card-footer main-bg text-center mt-3 rounded d-flex justify-content-between">
                                    <a href="{{ route('announcementShow', compact('announcement')) }}"
                                        class="text-decoration-none text-dark fw-semibold"><i
                                            class=" me-2 bi bi-info-square-fill text-dark fs-6"></i>Info</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-md-6 col-11 mx-auto mt-5 justify-content-center d-flex align-iteams-center flex-column h404 rounded">
                            <p class=" text-center lead fs-4 fw-semibold">{{ __('ui.index_Empty') }}</p>
                            <p class=" text-center lead fs-4 fw-semibold">{{ __('ui.index_Empty1') }}</p>
                        </div>
                        <div class="col-md-6 col-12 align-items-center d-flex mb-3">
                            <img class="img-logo2 img-fluid ms-md-5 pb-5" src="../image/123.png" alt="">
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- End Card Search Announcement --}}

            {{-- End Card All Announcement --}}


        </div>
    </div>
    {{-- End Search Zone --}}




    {{-- Page Navigation --}}
    {{-- <div class="col-12 d-flex justify-content-center mb-4">
        {{ $announcements->links() }}
</div> --}}
</div>
