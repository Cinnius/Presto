<x-layout>
    @if (session()->has('message'))
@endif
    <x-slot name="title">New Announcement</x-slot>
    
    <div class="margin-custom"></div>
    <h1 class="text-center fw-semibold mt-2 py-3">{{__('ui.add_Announcement')}}</h1>
    <livewire:create-announcement>
</x-layout>