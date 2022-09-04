<x-layout>
    <x-slot name="title">{{ __('ui.index_Title') }}</x-slot>
    {{-- category zone --}}
    @livewire('sort-category', ['announcements' => $announcements])


</x-layout>
