<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2 class="text-center mt-5">Revisiona gli ultimi annunci</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum veniam facere et autem, alias molestiae eveniet voluptates nobis adipisci excepturi nihil corrupti dolor quas earum illum dicta aperiam ea aut?!</p>
            </div>
            @if ($announcement)
                <div class="col-12 col-md-6 py-4 d-flex justify-content-center mt-5">
                    <div class="card card-shadow rounded" style="width: 18rem;">
                        <img src="https://via.placeholder.com/200" class="card-img-top rounded p-1" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $announcement->title }}</h5>
                            <p class=" card-text fst-italic fw-normal">Aggiunto il:
                                {{ $announcement->created_at->format('d/m/Y') }}</p>
                            <p class="card-text"><i class="bi bi-tags-fill text-dark me-2"></i> €
                                {{ $announcement->price }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('announcementShow', compact('announcement')) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-info-square-fill text-dark fs-6"></i> Info</a>
                                <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                    class="text-decoration-none text-dark fw-semibold"><i
                                        class="bi bi-bookmark-fill"></i> {{ $announcement->category->name }}</a>
                            </div>
                            <div class="card-footer main-bg text-center mt-5 rounded">
                                <p class="fs-6 fw-normal fst-italic">Venditore: {{ $announcement->user->name ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 mx-auto my-auto">
                    <h2 class="text-center">Review</h2>
                    <p>Questo annuncio è appropriato per la nostra piattaforma? Rispetta i nostri standard? Valuta attentamente la tua decisione!</p>
                    <div class="my-5 d-flex justify-content-evenly">
                        <form action="{{ route('acceptAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Accetta</button>
                        </form>
                        <form action="{{ route('rejectAnnouncement', ['announcement' => $announcement]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Rifiuta</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-8 mx-auto mt-5 text-center">
                    <h3>Non hai altri articoli da controllare!</h3>
                    <p>Torna più tardi per controllare se ci sono nuovi annunci da revisionare oppure visualizza gli annunci nella sezione "Ultimi annunci processati" per controllare l'operato degli altri Revisori!</p>
                </div>
            @endif
            <div class="row justify-content-center w-100 g-0">
                <div class="col-12 d-flex justify-content-center justify-content-md-end mt-4 mt-xl-2 me-0">
                    <a class="text-decoration-none text-dark btn main-btn fst-italic fw-semibold fs-5 me-0 me-md-5" href="{{route('rewiewAnnouncements')}}">Rivedi gli ultimi annunci revisionati</a>
                </div>
            </div>  
        </div>
    </div>

</x-layout>
