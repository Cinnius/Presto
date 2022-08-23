<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/200" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/200" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/200" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://via.placeholder.com/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{$announcement->body}}</p>

                        <a href="#" class="btn btn-primary">vai a {{$announcement->category->name}}</a>
                        <div class="card-footer">
                            <p>creato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                            <p>ultima modifica: {{$announcement->updated_at->format('d/m/Y')}}</p>
                            <p>inserito da: {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>