<x-layouts.master-layout>
    <x-show-outer class="flex">
        <x-img src="{{ $movie['poster_path'] }}" alt="" class="w-96" />
        <div class="ml-24">
            <x-heading-show>
                {{ $movie['title'] }}
            </x-heading-show>
            <div class="flex items-center text-gray-400 text-sm mt-1">
                <x-star />
                <span class="ml-1">{{ $movie['vote'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['release_date'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['genres'] }}</span>
                {{-- <span>
                    @foreach ($movie['genres'] as $genre)
                        {{ $genre['name'] }}@if (!$loop->last), @endif
                    @endforeach
                </span> --}}
            </div>
            <p class="mt-8 text-gray-300">
                {{ $movie['overview'] }}
            </p>

            <div class="mt-12">
                <h4 class="text-white font-semibold">Featured Crew</h4>
                <div class="flex mt-4">

                    @foreach ($movie['crews'] as $crew)
                        {{-- @if ($loop->index < 3) --}}
                        <div class="mr-8">
                            <div>{{ $crew['name'] }}</div>
                            <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                        </div>
                        {{-- @else
                            @break
                        @endif --}}
                    @endforeach

                </div>
            </div>

            <div x-data="{ isOpen:false }">
                @if ($movie['video'])
                    <div class="mt-12">
                        <button @click="isOpen = true"
                            class="inline-flex items-center bg-orange-500 text-gray-900 rounde font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                    </div>

                    <template x-if="isOpen">
                        <x-media-modal video="true">
                            <x-slot name="video">
                                <iframe width="560" height="315" class=" h-100 w-100 " src=" {{ $movie['video'] }}"
                                    style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </x-slot>
                        </x-media-modal>
                    </template>
                @endif
            </div>

        </div>
    </x-show-outer>


    <x-show-outer>
        <x-heading-show>
            Cast
        </x-heading-show>
        <x-movies-grid class="grid-cols-5">

            @foreach ($movie['casts'] as $cast)
                {{-- @if ($loop->index < 5) --}}
                <a href="{{ route('actor.show', $cast['id']) }}">
                    <x-cast name="{{ $cast['name'] }}" char="{{ $cast['character'] }}"
                        img="{{ $cast['profile_path'] }}">
                    </x-cast>
                </a>
                {{-- @else
                    @break
                @endif --}}
            @endforeach

        </x-movies-grid>
    </x-show-outer>

    @if(count($movie['images'])>0)
    <x-show-outer>
        <x-heading-show>
            Images
        </x-heading-show>
        <x-movies-grid grid="grid-cols-3">

            @foreach ($movie['images'] as $image)
                {{-- @if ($loop->index < 9) --}}
                <x-images img="{{ $image['file_path'] }}"></x-images>
                {{-- @else
                    @break
                @endif --}}
            @endforeach

        </x-movies-grid>

    </x-show-outer>
    @endif

</x-layouts.master-layout>
