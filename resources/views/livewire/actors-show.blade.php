<x-layouts.master-layout>

    <div class="container px-4 mx-auto ">
        <x-show-outer>


            <div class="popular-movies">
                <x-heading>Popular Actors</x-heading>
                <x-movies-grid>

                    @foreach ($popularActors as $actor)
                        <x-movie-card id="{{ $actor['id'] }}" title="{!! $actor['name'] !!}">



                            <x-slot name="image">
                                <x-img src="{{ $actor['profile_path'] }}"></x-img>
                            </x-slot>
                            <x-slot name="known">
                                <div class="truncate">{!! $actor['known_for'] !!}</span>
                            </x-slot>

                        </x-movie-card>
                    @endforeach


                </x-movies-grid>
                {{-- <div class="flex mt-16 justify-between"> --}}
                    {{-- @if ($previous) --}}
                        {{-- <a href="{{ url('actors/page/'.$previous) }}">Previous</a> --}}
                        {{-- <a href="/actors/page/{{ $previous }}">Previous</a> --}}
                    {{-- @else --}}
                        {{-- <div></div> --}}
                    {{-- @endif --}}
                    {{-- @if ($next) --}}
                        {{-- <a href="{{ url('actors/page/'.$next) }}">Next</a> --}}
                    {{-- @else --}}
                        {{-- <div></div> --}}
                    {{-- @endif --}}

                {{-- </div> --}}

                {{-- <div class="flex mt-16 justify-between">
                   {{ $popularActors->links() }}
                </div> --}}
            </div>
        </x-show-outer>

    </div>
</x-layouts.master-layout>
