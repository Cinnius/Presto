<div>
    <div class="container">
        <div class="row">

            <div class="col-8">
                <div class="comment-box ml-2">
                    <h5>Aggiungi una recensione!</h5>
                    <form class="rating" wire:submit.prevent="store">

                        <div class="ms-1 mb-2">
                            <input type="radio" name="rating" wire:model="vote" value="1" id="1"
                                class="d-none"><label for="1">
                                @if ($vote >= 1)
                                    <i class="bi bi-star-fill main-text"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            </label>
                            <input type="radio" name="rating" wire:model="vote" value="2" id="2"
                                class="d-none"><label for="2">
                                @if ($vote >= 2)
                                    <i class="bi bi-star-fill main-text"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            </label>
                            <input type="radio" name="rating" wire:model="vote" value="3" id="3"
                                class="d-none"><label for="3">
                                @if ($vote >= 3)
                                    <i class="bi bi-star-fill main-text"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            </label>
                            <input type="radio" name="rating" wire:model="vote" value="4" id="4"
                                class="d-none"><label for="4">
                                @if ($vote >= 4)
                                    <i class="bi bi-star-fill main-text"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            </label>
                            <input type="radio" name="rating" wire:model="vote" value="5" id="5"
                                class="d-none"><label for="5">
                                @if ($vote >= 5)
                                    <i class="bi bi-star-fill main-text"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            </label>
                        </div>
                        <textarea class="form-control" placeholder="Cosa pensi di questo prodotto?" rows="4" wire:model="review"></textarea>
                        <div class="comment-btns mt-2">
                            <div class="row">

                                <div class="col-6">
                                    <div class="pull-right">
                                        <button class="btn main-btn send btn-sm px-4 py-1 fs-6 my-2">Invia!<i
                                                class="fa fa-long-arrow-right ml-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
            </div>
        </div>
    </div>


</div>
