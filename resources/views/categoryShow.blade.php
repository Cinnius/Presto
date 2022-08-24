<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
{{--                 <h1>{{ $announcements->category_id->name }}</h1>
 --}}            </div>
            <div class="col-12">
                @forelse ($announcements as $announcement)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text">{{ $announcement->body }}</p>
                                <a href="{{ route('announcementShow', compact('announcement')) }}"
                                    class="btn btn-primary">vai al dettaglio</a>
                                <div class="card-footer">
                                    <p>creato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                                    <p>ultima modifica: {{ $announcement->updated_at->format('d/m/Y') }}</p>
                                    <p>inserito da: {{ $announcement->user->name ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @empty
                    <p>Non vi è presente alcun articolo in codesta categoria</p>
                    <a href="{{ route('createAnnouncement') }}">Aggiungi articolo</a>
                @endforelse
                
            </div>
        </div>
    </div>


</x-layout>
