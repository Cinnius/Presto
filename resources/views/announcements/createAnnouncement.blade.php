<x-layout>
    @if (session()->has('message'))
        <div class="toast show position-fixed bottom-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header main-bg">
                <img src="/image/gruppo_1_logotipo.png" class="toastLogo rounded me-2" alt="...">
                <strong class="me-auto text-dark">Presto.it</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body white-bg">
                <p>{{ session('message') }}</p>
                <a href="{{route('welcome')}}" class="btn main-btn">{{ __('ui.back_Home') }}</a>
            </div>
        </div>
    @endif
    <x-slot name="title">New Announcement</x-slot>
    
    <div class="margin-custom"></div>
    <h1 class="text-center fw-semibold mt-2 py-3">{{__('ui.add_Announcement')}}</h1>
    <livewire:create-announcement>
</x-layout>