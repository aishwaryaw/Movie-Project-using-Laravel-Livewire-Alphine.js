<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Livewire\Component;

class MoviesListSearch extends Component
{
    public $search= '';

    public function clear()
    {
        $this->search='';
    }

    public function render()
    {
        $popularMovies = [];
        $nowPlayingMovies=[];
        $genresArray=[];

        if(strlen($this->search) > 2){

            $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
            ->json()['results'];

            $nowPlayingMovies = null;
          
        }
    
        else{

        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()["results"];

    }

      

        $genres = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()["genres"];

        $genresArray = collect($genres)->mapWithKeys(function($genre) {
            return [($genre['id']) => ($genre['name']) ] ;
        });

       

    
    $viewModel = new MoviesViewModel(
        $popularMovies,
        $nowPlayingMovies,
        $genresArray
        
    );

    return view('livewire.movies-list-search' , $viewModel);
    
    }
        //dd($searchedResults);
        
        
    
        
}
