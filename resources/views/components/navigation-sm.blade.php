<nav {{ $attributes->merge(['class' => 'md:hidden border-b border-gray-800']) }}>

    <div>
        <ul class=" hidden  items-center">
            <li>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h8m-8 6h16">
                    </path>
                </svg>
            </li>
            <li>
                <x-logo />
            </li>
            <li class="ml-16 hover:text-gray-300">
                <a href="">Movies</a>
            </li>
            <li class="ml-6 hover:text-gray-300">
                <a href="">TV Shows</a>
            </li>
            <li class="ml-6 hover:text-gray-300">
                <a href="">Actors</a>
            </li>
        </ul>
    </div>

    <div class="container mx-auto px-4 py-6 flex items-center justify-between">

        <div class="flex items-center">
            <button>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
            </svg>
            </button>
            <x-logo class="ml-2"/>
        </div>

        <div class="flex items-center">
            <div class="relative">
                <input type="text" placeholder="Search"
                    class="text-sm px-4 py-1 pl-8 focus:outline-none w-full focus:shadow-outline bg-gray-800 rounded-full">
                <div class="absolute top-0 ml-2 mt-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

        </div>
        <div class="ml-4">
            <a href="#">
                <img src="{{ asset('images/avatar/avatar.jpg') }}" alt="avatar" class="rounded-full w-8 h-8 ">
            </a>
        </div>
    </div>

</nav>
