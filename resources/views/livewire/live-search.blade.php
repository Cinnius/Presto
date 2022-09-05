<div>
    {{-- searchbar --}}

    <form action="{{ route('searchAnnouncements') }}" method="GET" class="form">
        <input type="text" class="form-control form-input" placeholder="{{__('ui.search_Placeholder')}}" wire:model="searchValue"
            name="searched">
        <button type="submit" class="border-0 p-0">
            <span class="left-pan pan-customR "><i class="bi bi-search"></i></span>
        </button>

        @if (!empty($searchValue))
            <div wire:click='resetSearchValue' class="showX">
                <span class=" pan-customL right-pan"><i class="bi bi-x-square-fill text-dark"></i></span>
            </div>

            <ul class="list-group w-100">

                @forelse ($announcements as $announcement)
                    <a href="{{ route('announcementShow', compact('announcement')) }}" class="text-decoration-none">
                        <li class="list-group-item main-bg bg-white rounded d-flex">{{ $announcement->title }} @foreach($categories as $category)@if(($announcement->category_id ) == $category->id)<p class="fw-bolder opacity-50">- in {{ $category->name }}</p>@endif @endforeach </li>
                    </a>
                @empty
                    
                @endforelse
            </ul>
        @endif
    </form>

</div>
