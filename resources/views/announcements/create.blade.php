<x-layout>
    @if (session()->has('message'))
@endif
    <x-slot name="title">New Announcement</x-slot>
    
    <h1 class="text-center fw-semibold mt-2 py-3">Inserisci il tuo annuncio</h1>
    <livewire:create-announcement>
    <p class="text-center"></p>
</x-layout>