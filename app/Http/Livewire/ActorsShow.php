<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\ViewModels\ActorsViewModel;
use Illuminate\Support\Facades\Http;

class ActorsShow extends Component
{
    use WithPagination;
    public $popularActors;
    public $page;
    // public $views;

    // public function mount($cabbage)
    // {
    //     $this->popularActors = $cabbage;
    // }


    public function render()
    {
        $popularActors = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular', [
            'page' =>$this->page,
            'limit' => 12,
        ])->json()['results'];

        // ->json()['results'];
        $this->popularActors = $popularActors;
        // $viewModel = new ActorsViewModel($popularActors, $page);
        // return view('components.actors.index', $viewModel);
        return view('livewire.actors-show');
    }
}
