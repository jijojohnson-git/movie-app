@props(['img' => '', 'name' => '', 'char' => ''])


        <x-movie-card character=true images="true">
            <x-slot name="image">
                @if ($img)
                    <x-img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $img }}"></x-img>
                @else
                    {{-- <x-img src="https://via.placeholder.com/224x336"></x-img> --}}
                    <x-img src="https://ui-avatars.com/api/?size=235&name={{ $name }}"></x-img>
                    {{-- <x-img src="https://avatars.dicebear.com/api/avataaars/size=200/:seed.svg"></x-img> --}}

                @endif
            </x-slot>
            <x-slot name="character">
               <h3 class="font-bold text-gray-300">{{ $name }}</h3>
               <h3>{!! $char !!}</h3>
            </x-slot>
        </x-movie-card>



