<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search= '';

    public function render()
    {
        $searchedResults = [];

        if(strlen($this->search) > 2){

        $searchedResults = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
        ->json()['results'];

        //dd($searchedResults);
        }
        
        

        return view('livewire.search-dropdown' ,  [
            'searchedResults' => collect($searchedResults)->take(7),
        ]);
        
    }
}
