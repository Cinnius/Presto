<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @if ($announcement->images)
    @foreach ($announcement->images as $image)
    <div class="carousel-item @if($loop->first)active @endif">
      <img src="{{$image->path}}" class="d-block w-100" alt="...">
    </div>
    @endforeach
    @else
    <div class="carousel-item active">
      <img src="https://via.placeholder.com/500" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/500" class="d-block w-100" alt="...">
    </div>
    @endif
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