<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use App\ViewModels\ShowViewModel;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function index()
    {
        $popularShows = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/tv/popular')
                        ->json()['results'];

        $topRatedShows = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/tv/top_rated')
                        ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'), 'Bearer')
                        ->get('https://api.themoviedb.org/3/genre/tv/list')
                        ->json()['genres'];

        $viewModel = new TvViewModel($popularShows, $genres, $topRatedShows);

        return view('components.tv.index', $viewModel);
    }

    public function show($id)
    {

        $show = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
                        ->json();

        $viewModel = new ShowViewModel($show);
        return view('components.tv.show', $viewModel);

    }
}
