<x-layout>

        {{-- searchbar --}}
        <div class="container">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <form action="{{ route('searchAnnouncements') }}" method="GET" class="form">

                        <input type="text" class="form-control form-input" placeholder="cerca un articolo..."
                            name="searched">
                        <button type="submit" class="border-0 p-0">
                            <span class="left-pan"><i class="bi bi-search"></i></span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid pt-2 py-5">
        <div class="row justify-content-md-around">

            @forelse ($announcements as $announcement)
                <div class="col-12 col-md-3 py-4 d-flex justify-content-center mt-5">
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
            @empty
            <div class="col-12">
                <div class="alter alter warning py-3 shadow">
                    <p class="lead">Non sono presenti annunci per questa ricerca, prova con altre parole chiave</p>
                </div>
            </div>
            
            @endforelse


            {{-- Page Navigation --}}
            <div class="col-12 d-flex justify-content-center mb-4">
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
</x-layout>
