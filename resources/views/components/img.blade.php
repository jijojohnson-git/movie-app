@props(['modal' => false])

<img {{ $attributes->merge(['class' => 'hover:opacity-75 transition ease-in-out
    duration-150']) }} />

{{-- @if($modal)

<x-media-modal image="true">
    <x-slot name="zoom">
        <img {{ $attributes->merge(['class' => 'hover:opacity-75 transition ease-in-out
        duration-150']) }} />
    </x-slot>
</x-media-modal>

@endif --}}
