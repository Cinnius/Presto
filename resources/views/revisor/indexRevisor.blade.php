<x-layout>
    <div class="container">
        <div class="row">
            @if($announcement)
            <div class="col-12 py-4 d-flex justify-content-center mt-5">
                <div class="card card-shadow rounded" style="width: 18rem;">
                    <img src="https://via.placeholder.com/200" class="card-img-top rounded p-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                        <p class=" card-text fst-italic fw-normal">Aggiunto il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> € {{ $announcement->price }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('announcementShow', compact('announcement')) }}" class="text-decoration-none text-dark fw-semibold"><i class="bi bi-info-square-fill text-dark fs-6"></i> Info</a>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}" class="text-decoration-none text-dark fw-semibold"><i class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                        </div>
                        <div class="card-footer main-bg text-center mt-5 rounded">                               
                            <p class="fs-6 fw-normal fst-italic">Venditore: {{ $announcement->user->name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <form action="{{route('acceptAnnouncement', ['announcement'=>$announcement])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">Accetta</button>
                </form>
            </div>
            <div class="col-6">
                <form action="{{route('rejectAnnouncement', ['announcement'=>$announcement])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                </form>
            </div>
            @else
            <div class="container">
                <div class="row">
                    <h1>non hai articoli da controllare!</h1>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-layout>