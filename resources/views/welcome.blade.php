<x-layout>
    <x-slot name="title">welcome</x-slot>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <h1 class="text-danger">ciaooooo</h1>
</x-layout>