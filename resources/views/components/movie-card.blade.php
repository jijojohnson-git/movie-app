@props(['span' => false, 'tv'=> false, 'actor' => false, 'genre' => false, 'known' => false, 'character' => false, 'images' => false, 'title' => '', 'rating', 'vote', 'release', 'id' => ''])

<div class="mt-8 item">

    @if (!$images)

        <div class="">

            @if ($actor)
                <a href="{{ route('actor.show', $id) }}" class="">
                    {{ $image }}
                    <h3 class="text-lg mt-2 hover:gray-300">{!! $title !!}</h3>
                </a>
            @elseif ($tv)
                <a href="{{ route('tv.show', $id) }}" class="">
                    {{ $image }}
                    <h3 class="text-lg mt-2 hover:gray-300">{!! $title !!}</h3>
                </a>
            @else
                <a href="{{ route('show', $id) }}" class="">
                    {{ $image }}
                    <h3 class="text-lg mt-2 hover:gray-300">{!! $title !!}</h3>
                </a>
            @endif

            @if ($span)
                <div class="flex items-center  text-gray-400 text-sm mt-1">
                    <svg class="fill-current w-4 h-4 text-orange-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                    <span class="ml-1">{{ $vote }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $release }}</span>
                </div>
            @endif

            <div class="text-gray-400 text-sm">

                @if ($genre)
                    <h4>
                        {{ $genre }}
                    </h4>
                @endif
                @if ($known)
                    <h4>
                        {{ $known }}
                    </h4>
                @endif


            </div>
        </div>

    @endif

    @if ($images && $character)
        <button class="">
            {{ $image }}
            <h3>
                {{ $character }}
            </h3>
        </button>
    @endif

    @if ($images && !$character)
        <div x-data="{isOpen:false}">
            <a href="#" @click.prevent="isOpen=true">
                {{ $image }}
            </a>

            <div x-show.transition.opacity="isOpen" x-cloak>
                <x-media-modal image="true">
                    <x-slot name="image">
                        {{ $imageBig }}
                    </x-slot>
                </x-media-modal>
            </div>

        </div>
    @endif


</div>
