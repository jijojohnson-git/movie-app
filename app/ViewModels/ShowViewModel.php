<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ShowViewModel extends ViewModel
{
    public $show;

    public function __construct($show)
    {
        $this->show = $show;
    }

    public function show()
    {

        $video = (count($this->show['videos']['results']) > 0)
            ? 'https://www.youtube.com/embed/' . $this->show['videos']['results'][0]['key']
            : '';

        return collect($this->show)->merge([

            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->show['poster_path'],
            'name' => $this->show['name'] . ' (' . Carbon::parse($this->show['first_air_date'])->format('Y') . ')',
            'vote' => $this->show['vote_average'] * 10 . '%',
            'first_air_date' => Carbon::parse($this->show['first_air_date'])->format('M d, Y'),
            'crews' => collect($this->show['credits']['crew'])->take(2),
            'casts' => collect($this->show['credits']['cast'])->take(5),
            'images' => collect($this->show['images']['backdrops'])->take(9),
            'video' => $video,
            'genres' => collect($this->show['genres'])->pluck('name')->implode(', ')
        ])->only([
            'poster_path', 'vote', 'name', 'first_air_date', 'overview', 'video', 'genres', 'crews', 'casts', 'images', 'created_by'
        ]);
    }
}
