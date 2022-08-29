<div>
   
    <form wire:submit.prevent="store">
        @csrf
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 gradient-custom px-4 py-4 rounded border-end border-white border-4">
                    <h3 class="text-center">Informazioni Annuncio</h3>
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" wire:model.debounce.2000ms="title" value={{old('title')}}
                            @error('title') is-invalid @enderror>
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <textarea class="form-control" cols="30" rows="10" wire:model.debounce.2000ms="body" value={{old('body')}}
                            @error('body') is-invalid @enderror></textarea>
                        @error('body')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prezzo</label>
                        <input type="number" step="0.01" class="form-control" wire:model="price"
                            @error('price') is-invalid @enderror>
                        @error('price')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select wire:model.defer="category" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($categories as $category)
                                <option class="option-form" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Immagini</label>
                        <input type="file" wire:model="temporary_images" name="images" multiple
                            class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="img">
                        @error('temporary_images.*')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn main-btn">Aggiungi annuncio</button>
                    </div>
                </div>
                {{-- Photo Preview --}}
                <div class="col-12 col-md-6 px-4 py-4 rounded Photo-Preview-BG">
                    <h3 class="text-center">Photo preview</h3>
                    @if (!empty($images))
                        <div class="row">
                            @foreach ($images as $key => $image)
                                <div class="col-6 col-md-3 my-3">
                                    <div>
                                        <img src="{{ $image->temporaryUrl() }}" alt=""
                                            class="img-preview shadow rounded">
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button type="button" class="btn btn-danger px-2 shadow"
                                            wire:click="removeImage({{ $key }})">Cancella</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="ms-5">
                            <p>Ancora non hai caricato nessuna immagine, prova a caricarne qualcuna!</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </form>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

</div>
