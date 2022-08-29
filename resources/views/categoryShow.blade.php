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
                                    <p>{{__('ui.Announcement_Created')}} {{ $announcement->created_at->format('d/m/Y') }}</p>
                                    <p>{{__('ui.Announcement_Updated')}} {{ $announcement->updated_at->format('d/m/Y') }}</p>
                                    <p>{{__('ui.Announcement_Seller')}} {{ $announcement->user->name ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @empty
                    <p>{{__('ui.category_Empty')}}</p>
                    <a href="{{ route('createAnnouncement') }}">{{__('ui.category_Empty_Text')}}</a>
                @endforelse
                
            </div>
        </div>
    </div>


</x-layout>
