<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    protected $searchResults = [];

    public function render()
    {
        if (strlen($this->search) > 2) {
            $results = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/multi?include_adult=true&query=' . $this->search)
                ->json()['results'];
            $this->searchResults = collect($results)->where('media_type', '!=', 'person')->sortByDesc('popularity')->take(7)
                ->map(function ($result) {

                    if ($result['media_type'] === 'movie') {
                        $title = $result['title'] ?? '';
                        $release = $result['first_air_date'] ?? '';

                    } else {
                        $title = $result['name'] ?? '';
                        $release = $result['name'] ?? '';
                    }

                    return collect($result)->merge([
                        'release_date' => $release,
                        'title' => $title,
                        'route' => $result['media_type'] === 'movie' ? route('show', $result['id']) : route('tv.show', $result['id']),
                    ]);
                });
        }
        return view('livewire.search-dropdown', [
            'searchResults' => $this->searchResults
        ]);
    }
}
