<div>
    {{-- searchbar --}}
  
                <form action="{{ route('searchAnnouncements') }}" method="GET" class="form">
                    <input type="text" class="form-control form-input" placeholder="cerca un articolo..."
                        wire:model="searchValue" name="searched">
                    <button type="submit" class="border-0 p-0" >
                        <span class="left-pan pan-customR "><i class="bi bi-search"></i></span>
                    </button>
                    
                    <div  wire:click='resetSearchValue'>
                        <span class=" pan-customL right-pan"><i class="bi bi-x-square-fill"></i></span>
                    </div>
                    @if (!empty($searchValue))
                    
                        <ul class="list-group">

                            @forelse ($announcements as $announcement)
                                <a href="{{ route('announcementShow', compact('announcement')) }}">
                                    <li class="list-group-item">{{ $announcement->title }}</li>
                                </a>
                            @empty
                                <p class="text-danger">Nessun annuncio trovato!</p>
                            @endforelse
                        </ul>
                    @endif
                </form>

</div>
