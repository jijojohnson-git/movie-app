<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actor;
    public $social;
    public $credits;

    public function __construct($actor, $social, $credits)
    {
        $this->actor = $actor;
        $this->social = $social;
        $this->credits = $credits;
    }

    public function actor()
    {
        return collect($this->actor)->merge([

            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age ,
            'profile_path' => $this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w300' . $this->actor['profile_path']
                : 'https://via.placeholder.com/400x450',

        ])->only([
            'profile_path','birthday', 'age', 'homepage', 'biography','name', 'place_of_birth'
        ]);


    }
    public function social()
    {
        return collect($this->social)->merge([
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id']
            : null,
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id']
            : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id']
            : null,
        ])->only(['facebook', 'instagram', 'twitter']);
    }
    public function knownForMovies()
    {

        // $movies = collect($this->credits)->get('cast);
        return collect($this->credits['cast'])
        // ->where('media_type', 'movie')
        ->sortByDesc('popularity')
        ->take(5)
        ->map(function($movie)
        {
            if(isset($movie['title']))
        {
            $title = $movie['title'];
        }
        elseif(isset($movie['name']))
        {
            $title = $movie['name'];

        }
        else
        {
            $title = 'Untitled';

        }
            return collect($movie)->merge([
                 'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w185' . $movie['poster_path']
                 : 'https://via.placeholder.com/185x278',
                 'title' => $title,
                 'link' => $movie['media_type'] === 'movie' ? route('show', $movie['id']) : route('tv.show', $movie['id']),

                //  'title' => isset($movie['title']) ? $movie['title'] : 'Untitled', //if movie and tv shows
            ]);
            }
        );
    }
    public function credits()
    {

        $credits =  collect($this->credits)->get('cast');
        return collect($credits)->map(function($credit)
        {
            if(isset($credit['release_date']))
            {
                $releaseDate = $credit['release_date'] ;
            }
            elseif(isset($credit['first_air_date']))
            {
                $releaseDate = $credit['first_air_date'];
            }
            else
            {
                $releaseDate = '';
            }

            if(isset($credit['title']))
            {
                $title = $credit['title'];
            }
            elseif (isset($credit['name']))
            {
                $title = $credit['name'];
            }
            else
            {
                $title = 'Untitled';
            }

            return collect($credit)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate)
                    ? Carbon::parse($releaseDate)->format('Y')
                    : ' ---- ',
                'title' => $title,
                'character' => $credit['character'] ? $credit['character'] : ' ---- ',
            ])
            ->only(['release_year', 'title', 'character']);
        })
        ->sortByDesc('release_year');
    }
}
