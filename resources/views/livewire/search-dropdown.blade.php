<div class="relative" x-data="{isOpen:true}">
    <input type="text"
    wire:model.debounce.500="search"
    x-ref="search"
    @keydown.window= "
    if(event.keyCode === 191)
    {
        event.preventDefault();
        $refs.search.focus();
    }
    "
    @keydown.escape.window="isOpen = false"
    @keydown.shift.tab="isOpen = false"
    @focus="isOpen = true"
    @keydown="isOpen = true"

    placeholder="Search"
        class="text-sm px-4 py-1 pl-8 focus:outline-none w-64 focus:shadow-outline bg-gray-800 rounded-full">
    <div class="absolute top-0 ml-2 mt-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>

    <div wire:loading class="spinner top-1/2 right-4 "></div>
    @if (strlen($search) > 2)

    <div x-show.transition.opacity="isOpen"  class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4">
        <ul>
            @if ($searchResults->count() > 0)
                @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700 " >
                        <a x-ref="big" @focus="isOpen=true" href="{{ $result['route'] }}"
                            class="flex items-center hover:bg-gray-700 px-4 py-4"
                            @if ($loop->last) @keydown.tab="isOpen=false"  @endif >
                            @if ($result['poster_path'])
                                <img class="w-8" src="https://image.tmdb.org/t/p/w500{{ $result['poster_path'] }}" alt="">
                            @else
                                <img class="w-8" src="https://via.placeholder.com/50x75" alt="">
                            @endif
                            <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
                @endforeach
            @else
                <li class="border-b border-gray-700 ">
                    <span class="block hover:bg-gray-700 px-4 py-4">
                        No results found for {{ "$search" }}
                    </span>
                </li>

            @endif
        </ul>
    </div>
    @endif
</div>
