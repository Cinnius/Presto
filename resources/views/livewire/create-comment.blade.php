<div>
    <form wire:submit.prevent="store">
        @csrf
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-12 gradient-custom shadow py-4">
                    <h3 class="text-center">{{ __('ui.comment_Title') }}</h3>
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.comment_Text') }}</label>
                        <textarea class="form-control" cols="30" rows="10" wire:model.debounce.500ms="comment" value={{old('comment')}}
                            @error('comment') is-invalid @enderror></textarea>
                        @error('comment')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn main-btn">{{ __('ui.comment_BTN') }}</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
