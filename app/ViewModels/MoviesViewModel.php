<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $genres;
    public $nowPlayingMovies;

    public function __construct($popularMovies, $genres, $nowPlayingMovies)
    {
        $this->popularMovies = $popularMovies;
        $this->genres = $genres;
        $this->nowPlayingMovies = $nowPlayingMovies;
    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys( fn($genre) =>
             [ $genre['id'] => $genre['name'] ]
         );
    }

    private function formatMovies($movies)
    {

        return collect($movies)->map( function($movie)
        {

            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($id) {
                                    return [$id => $this->genres()->get($id)];
                                })->implode(', ');

            return collect($movie)->merge([
                    'poster_path'=>'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'],
                    'vote_average'=> $movie['vote_average'] * 10 . '%',
                    'release_date'=> Carbon::parse($movie['release_date'])->format('M d, Y'),
                    'genres' => $genresFormatted
                ])->only(['id', 'poster_path','vote_average', 'title', 'release_date', 'overview','genre_ids', 'genres']);

        });
    }
}

