<x-layout>
    <x-slot name="title">Annunci inseriti</x-slot>
    {{-- category zone --}}
    @livewire('sort-category', ['announcements' => $announcements])

</x-layout>
