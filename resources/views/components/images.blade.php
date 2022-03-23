@props(['img'=>''])
       <x-movie-card images=true >
           <x-slot name="image">
               <x-img src="https://image.tmdb.org/t/p/w500{{ $img }}" alt="" />
           </x-slot>
           <x-slot name="imageBig">
               <x-img src="https://image.tmdb.org/t/p/original{{ $img }}" alt="" />
           </x-slot>
       </x-movie-card>
