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

            <ul class="list-group">

                @forelse ($announcements as $announcement)
                    <a href="{{ route('announcementShow', compact('announcement')) }}" class="text-decoration-none">
                        <li class="list-group-item main-bg bg-white rounded">{{ $announcement->title }}</li>
                    </a>
                @empty
                    
                @endforelse
            </ul>
        @endif
    </form>

</div>
