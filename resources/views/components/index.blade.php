<x-layouts.master-layout>

    <div class="container px-4 mx-auto ">
        <x-show-outer>


            <div class="popular-movies">
                <x-heading>Popular Movies</x-heading>
                <x-movies-grid>

                    @foreach ($popularMovies as $movie)

                        <x-movie-card span=true id="{{ $movie['id'] }}" title="{!! $movie['title']  !!}"
                            vote="{{ $movie['vote_average'] }}"
                            release="{{ $movie['release_date'] }}">

                            <x-slot name="genre">
                                {{ $movie['genres'] }}
                                {{-- @foreach ($movie['genres'] as $genre)
                                    {{ $genres->get($genre) }}
                                @endforeach --}}
                            </x-slot>

                            <x-slot name="image">
                                <x-img src="{{ $movie['poster_path'] }}"></x-img>
                            </x-slot>

                        </x-movie-card>

                    @endforeach

                </x-movies-grid>
            </div>
        </x-show-outer>
        <x-show-outer>
            <div class="now-playing">
                <x-heading>Now Playing Movies</x-heading>
                <x-movies-grid>
                    @foreach ($nowPlayingMovies as $movie)

                        <x-movie-card span=true  id="{{ $movie['id'] }}" title="{{ $movie['title'] }}" vote="{{ $movie['vote_average'] }}"
                            release="{{ $movie['release_date'] }}">
                            <x-slot name="genre">
                                {{ $movie['genres'] }}
                                {{-- @foreach ($movie['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }} @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach --}}
                            </x-slot>
                            <x-slot name="image">
                                <x-img src="{{ $movie['poster_path'] }}"></x-img>
                            </x-slot>
                        </x-movie-card>
                    @endforeach
                </x-movies-grid>
            </div>
        </x-show-outer>
    </div>
</x-layouts.master-layout>
