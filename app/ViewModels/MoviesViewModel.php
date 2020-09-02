<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;


class MoviesViewModel extends ViewModel
{
    public $popularMovies ;
    public $nowPlayingMovies;
    public $genresArray;

    public function __construct($popularMovies, $nowPlayingMovies, $genresArray)
    {
        $this ->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genresArray = $genresArray;
    }

    public function popularMovies(){

        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies(){

        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genresArray(){

        return $this->genresArray;
    }


    private function formatMovies($movies){

        return collect($movies)->map(function($movie){

            $genres = collect($movie['genre_ids'])->mapWithKeys(function($value){

                return [ $value => $this->genresArray->get($value)];

            })->implode(', ');
            

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] :'https://via.placeholder.com/300x450',
                'vote_average' => $movie['vote_average'] * 10 . '%',
                'release_date'=>  isset($movie['release_date']) ? Carbon::parse($movie['release_date'])->format('M d, Y') : null,
                'genres' =>  $genres
            ]);
            

        });

    }
}
