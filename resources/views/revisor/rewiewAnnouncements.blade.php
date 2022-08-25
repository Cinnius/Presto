<x-layout>

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-8 mx-auto mt-5">
                <h2>Ultime Revisioni</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, voluptates optio dicta repellendus mollitia, praesentium excepturi, neque tempora suscipit magni reiciendis eum numquam. Repudiandae exercitationem aliquam, rerum eos magnam consequatur?</p>
            </div>
        </div>
        <div class="row justify-content-md-around">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-12 col-md-3 py-4 d-flex justify-content-center">
                    <div class="card card-shadow rounded position-relative" style="width: 18rem;">
                        <img src="https://via.placeholder.com/200" class="card-img-top rounded p-1" alt="...">
                        <div class="position-absolute end-0 mt-3">
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="text-decoration-none text-dark main-bg py-1 px-2 rounded me-3 "><i
                                    class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                        </div>
                        <div class="position-absolute mt-3">
                            <p class="text-decoration-none text-dark main-bg py-1 px-2 rounded ms-3 ">
                                @if ($announcement->is_accepted)
                                    annuncio accettato
                                @else
                                    annuncio rifiutato
                                    @endif
                            </p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                            <p class="card-text fst-italic fw-normal text-truncate">{{ $announcement->body }}
                            </p>
                            <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                {{ $announcement->price }}</p>
                            <div class="d-flex justify-content-between">
                                <p class="fs-6 fw-normal fst-italic my-auto">Venduto da:
                                    {{ $announcement->user->name ?? '' }}</p>
                                <p class="fs-6 fw-normal fst-italic my-auto">Creato il:
                                    {{ $announcement->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="card-footer main-bg text-center mt-3 rounded d-flex justify-content-between">
                                <a href="{{ route('announcementShow', compact('announcement')) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-info-square-fill text-dark fs-6"></i> Info</a>
                            </div>
                            <div class="mt-3 text-center">
                                <p>Vuoi modificare la visibilità?</p>
                                @if($announcement-> is_accepted)
                                <form action="{{ route('rejectAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger">rifiuta</button>
                                </form>
                                @else
                                <form action="{{ route('acceptAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Accetta</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alter alter warning py-3 shadow">
                        <p class="lead">Non sono presenti annunci</p>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
   
</x-layout>
