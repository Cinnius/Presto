<div>
    <form wire:submit.prevent="store">
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titolo</label>
            <input type="text" class="form-control" wire:model="title" @error('title') is-invalid @enderror>
            @error('title')
                <span class="error">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descrizione</label>
            <textarea class="form-control" cols="30" rows="10" wire:model="body" @error('body') is-invalid @enderror></textarea>
            @error('body')
                <span class="error">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" wire:model="price" @error('price') is-invalid @enderror>
            @error('price')
            <span class="error">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi annuncio</button>

    </form>
</div>
