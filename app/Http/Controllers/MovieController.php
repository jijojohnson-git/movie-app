<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/movie/popular')
                        ->json()['results'];

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/movie/now_playing')
                        ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'), 'Bearer')
                        ->get('https://api.themoviedb.org/3/genre/movie/list')
                        ->json()['genres'];

        $viewModel = new MoviesViewModel($popularMovies, $genres, $nowPlayingMovies);

        return view('components.index', $viewModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $movie = Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
                        ->json();

        $viewModel = new MovieViewModel($movie);
        return view('components.show', $viewModel);

    }
}
