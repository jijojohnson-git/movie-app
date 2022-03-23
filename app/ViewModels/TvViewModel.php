<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularShows;
    public $genres;
    public $topRatedShows;

    public function __construct($popularShows, $genres, $topRatedShows)
    {
        $this->popularShows = $popularShows;
        $this->genres = $genres;
        $this->topRatedShows = $topRatedShows;
    }

    public function popularShows()
    {
        return $this->formatShows($this->popularShows);
    }

    public function topRatedShows()
    {
        return $this->formatShows($this->topRatedShows);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys( fn($genre) =>
             [ $genre['id'] => $genre['name'] ]
         );
    }

    private function formatShows($shows)
    {

        return collect($shows)->map( function($show)
        {

            $genresFormatted = collect($show['genre_ids'])->mapWithKeys(function ($id) {
                                    return [$id => $this->genres()->get($id)];
                                })->implode(', ');

            return collect($show)->merge([
                    'poster_path'=> isset($show['poster_path']) ? 'https://image.tmdb.org/t/p/w500/' . $show['poster_path']
                    : 'https:via.placeholder.com/218x326',
                    'vote_average'=> $show['vote_average'] * 10 . '%',
                    'first_air_date'=> isset($show['first_air_date']) ? Carbon::parse($show['first_air_date'])->format('M d, Y')
                    : '----',
                    'name'=> isset($show['name']) ? $show['name']
                    : '----',
                    'genres' => $genresFormatted
                ])
                ->only(['id', 'poster_path','vote_average', 'name', 'first_air_date', 'overview','genre_ids', 'genres']);

        });
    }
}
