<div>
    <form wire:submit.prevent="store">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titolo</label>
                        <input type="text" class="form-control" wire:model.debounce.2000ms="title" @error('title') is-invalid @enderror>
                        @error('title')
                            <span class="error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Descrizione</label>
                        <textarea class="form-control" cols="30" rows="10" wire:model.debounce.2000ms="body"  @error('body') is-invalid @enderror></textarea>
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
                    <div class="mb-3">
                        <select wire:model.defer="category" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($categories as $category)
                                <option class="option-form" value="{{$category->id}}">{{$category->name}}</option>                            
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <input type="file" wire:model="temporary_images" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="img">
                        @error('temporary_images.*')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>

                    @if (!empty($images))

                        <div class="row">
                            <div class="col-12">
                                <p>Photo preview</p>
                                <div class="row border border-4 border-info rounded shadow">
                                    @foreach($images as $key=>$image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded" style="height:400px; width:400px; background-image: url({{$image->temporaryUrl()}});"></div>
                                        <button type="button" class="btn btn-danger shadow d-block" wire:click="removeImage({{$key}})">Cancella</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                    @endif

                    <button type="submit" class="btn main-btn">Aggiungi annuncio</button>
                    
                </div>
            </div>
        </div>
    </form>
</div>
