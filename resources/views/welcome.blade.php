<x-layout>
    <x-slot name="title">welcome</x-slot>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    
    {{--visualizzazione card per ulitmi annunci--}}
    
    <div class="container">
        <div class="row">
           
                @foreach($announcements as $announcement)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$announcement->title}}</h5>
                            <p class="card-text">{{$announcement->body}}</p>
                            <a href="#" class="btn btn-primary">vai al dettaglio</a>
                            <a href="#" class="btn btn-primary">vai a {{$announcement->category->name}}</a>
                            <div class="card-footer">
                                <p>creato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                                <p>ultima modifica: {{$announcement->updated_at->format('d/m/Y')}}</p>
                                <p>inserito da: {{$announcement->user->name ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            
        </div>
    </div>
    
</x-layout>