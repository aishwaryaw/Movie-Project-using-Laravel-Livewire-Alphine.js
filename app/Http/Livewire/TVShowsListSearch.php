<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use App\ViewModels\TVShowsModel;
use App\ViewModels\TVShowModel;
use Livewire\Component;

class TVShowsListSearch extends Component
{
    public $search= '';
    public $page_accessed;
    public $query;
  
    public function mount($page_accessed)
    {
       
        $this->page_accessed = $page_accessed;
       
    }

    public function clear()
    {
        $this->search='';
       
    }

    public function render()
    {

        $tvshows = [];
        $topRatedShows = [];
        $genresArray = [];
        //dd($tvshows);
        
        if(strlen($this->search) > 2){
            
            //error_log($this->page_accessed);
            $tvshows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/tv?query='.$this->search.'&page='.$this->page_accessed)
            ->json()['results']; 

            //dd($tvshows);
            $topRatedShows = null;
        }

        else{
            
        $tvshows = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/popular?page='.$this->page_accessed)
        ->json()['results'];

        
        $topRatedShows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated?page='.$this->page_accessed)
            ->json()['results'];

        }


        $genres = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/tv/list')
        ->json()["genres"];

        $genresArray = collect($genres)->mapWithKeys(function($genre) {
            return [($genre['id']) => ($genre['name']) ] ;
        });


        $viewModel = new TVShowsModel(
        $tvshows,
        $genresArray,
        $topRatedShows
        
    );

    return view('livewire.tv-shows-list-search' , $viewModel);
      
    }
}
