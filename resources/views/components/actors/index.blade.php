<x-layouts.master-layout>

    <div class="container px-4 mx-auto ">
        <x-show-outer>


            <div class="popular-movies">
                <x-heading>Popular Actors</x-heading>
                <x-movies-grid>

                    @foreach ($popularActors as $actor)
                        <x-movie-card actor=true id="{{ $actor['id'] }}" title="{!! $actor['name'] !!}">

                            <x-slot name="image">
                                <x-img src="{{ $actor['profile_path'] }}"></x-img>
                            </x-slot>
                            <x-slot name="known">
                                <div class="truncate">{!! $actor['known_for'] !!}</span>
                            </x-slot>

                        </x-movie-card>
                    @endforeach


                </x-movies-grid>
                {{-- <div class="flex mt-16 justify-between">
                    @if ($previous)
                        <a href="/actors/page/{{ $previous }}">Previous</a>
                    @else
                        <div></div>
                    @endif
                    @if ($next)
                        <a href="{{ url('actors/page/' . $next) }}">Next</a>
                    @else
                        <div></div>
                    @endif

                </div> --}}
                <div>
                    <div class="page-load-status">
                        <div class="flex justify-center">
                            <div class="infinite-scroll-request spinner text-4xl my-8"></div>
                        </div>
                        <p class="infinite-scroll-last text-center text-xl my-12">End of content</p>
                        <p class="infinite-scroll-error">No more pages to load</p>
                    </div>
                </div>
            </div>
        </x-show-outer>

    </div>

    @section('scripts')
        <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
        <script>
            let elem = document.querySelector('.grid');
            let infScroll = new InfiniteScroll(elem, {
                // options
                path: '/actors/page/@{{#}}',
                append: '.item',
                history: false,
                status: '.page-load-status'
            });
        </script>
    @endsection

</x-layouts.master-layout>
