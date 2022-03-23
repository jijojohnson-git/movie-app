
<nav {{ $attributes->merge(['class' => 'hidden md:block border-b border-gray-800']) }} >
    <div class="container mx-auto px-4 py-6 flex items-center justify-between">
        <ul class="flex items-center">
            <li>
                <x-logo />
            </li>
            <li class="ml-16 hover:text-gray-300">
                <a href="{{ url('/') }}">Movies</a>
            </li>
            <li class="ml-6 hover:text-gray-300">
                <a href="{{ url('tvshows') }}">TV Shows</a>
            </li>
            <li class="ml-6 hover:text-gray-300">
                <a href="{{ url('actors') }}">Actors</a>
            </li>
        </ul>
        <div class="flex items-center">
            <livewire:search-dropdown>
            <div class="ml-4">
                <a href="#">
                    <img src="{{ asset('images/avatar/avatar.jpg') }}" alt="avatar" class="rounded-full w-8 h-8 ">
                </a>
            </div>
        </div>
    </div>

</nav>
