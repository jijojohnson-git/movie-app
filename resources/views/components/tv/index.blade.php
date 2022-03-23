<x-layouts.master-layout>

    <div class="container px-4 mx-auto ">
        <x-show-outer>


            <div class="popular-movies">
                <x-heading>Popular Shows</x-heading>
                <x-movies-grid>

                    @foreach ($popularShows as $show)

                        <x-movie-card span=true tv=true id="{{ $show['id'] }}" title="{!! $show['name']  !!}"
                            vote="{{ $show['vote_average'] }}"
                            release="{{ $show['first_air_date'] }}">

                            <x-slot name="genre">
                                {{ $show['genres'] }}
                                {{-- @foreach ($show['genres'] as $genre)
                                    {{ $genres->get($genre) }}
                                @endforeach --}}
                            </x-slot>

                            <x-slot name="image">
                                <x-img src="{{ $show['poster_path'] }}"></x-img>
                            </x-slot>

                        </x-movie-card>

                    @endforeach

                </x-movies-grid>
            </div>
        </x-show-outer>
        <x-show-outer>
            <div class="now-playing">
                <x-heading>Top Rated Shows</x-heading>
                <x-movies-grid>
                    @foreach ($topRatedShows as $show)

                        <x-movie-card span=true tv=true id="{{ $show['id'] }}" title="{{ $show['name'] }}" vote="{{ $show['vote_average'] }}"
                            release="{{ $show['first_air_date'] }}">
                            <x-slot name="genre">
                                {{ $show['genres'] }}
                                {{-- @foreach ($show['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }} @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach --}}
                            </x-slot>
                            <x-slot name="image">
                                <x-img src="{{ $show['poster_path'] }}"></x-img>
                            </x-slot>
                        </x-movie-card>
                    @endforeach
                </x-movies-grid>
            </div>
        </x-show-outer>
    </div>
</x-layouts.master-layout>
