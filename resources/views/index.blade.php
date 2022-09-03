<x-layout>
    <x-slot name="title">{{ __('ui.index_Title') }}</x-slot>

            @livewire('search-sort', ['categories' =>$categories])

</x-layout>
