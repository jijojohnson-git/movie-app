<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {

        $video = (count($this->movie['videos']['results']) > 0)
                ? 'https://www.youtube.com/embed/' . $this->movie['videos']['results'][0]['key']
                : '';

        return collect($this->movie)->merge([

            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->movie['poster_path'],
            'title' => $this->movie['title'].' ('.Carbon::parse($this->movie['release_date'])->format('Y').')',
            'vote' => $this->movie['vote_average'] * 10 . '%',
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'crews' => collect($this->movie['credits']['crew'])->take(2),
            'casts' => collect($this->movie['credits']['cast'])->take(5),
            'images' => collect($this->movie['images']['backdrops'])->take(9),
            'video' => $video,
            'genres' => collect($this->movie['genres'])->pluck('name')->implode(', ')
        ])->only([
            'poster_path','vote', 'title', 'release_date', 'overview','video', 'genres', 'crews', 'casts', 'images'
        ]);
    }
}
