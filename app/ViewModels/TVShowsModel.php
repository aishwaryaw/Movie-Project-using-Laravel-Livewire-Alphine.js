<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class TVShowsModel extends ViewModel
{
    public $tvshows;
    public $genresArray;
    public $topRatedShows;
    //public $page_accessed;

    public function __construct($tvshows, $genresArray, $topRatedShows)
    {
        $this->tvshows = $tvshows;
        $this->topRatedShows = $topRatedShows;
        $this->genresArray = $genresArray;
        //$this->page_accessed = $page_accessed;
    }

    public function topRatedShows(){

        return collect($this->topRatedShows)->map(function($tvshow){


            $genres =  collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                 return [$value => $this->genresArray->get($value)];
             })->implode(', ');
 
         
             
             return collect($tvshow)->merge(
                 [
                     'poster_path' => $tvshow['poster_path'] ? 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'] :'https://via.placeholder.com/300x450',
                     'genres' =>$genres,
                     'first_air_date' => isset($tvshow['first_air_date']) ? Carbon::parse($tvshow['first_air_date'])->format('M d, Y') : null,
                     'vote_average' => $tvshow['vote_average'] * 10 . '%'
                 ]
                 );
         });   
    }



    public function tvshows(){

        return collect($this->tvshows)->map(function($tvshow){


           $genres =  collect($tvshow['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genresArray->get($value)];
            })->implode(', ');

        
            
            return collect($tvshow)->merge(
                [
                    'poster_path' => $tvshow['poster_path'] ? 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'] :'https://via.placeholder.com/300x450',
                    'genres' =>$genres,
                    'first_air_date' => isset($tvshow['first_air_date']) ? Carbon::parse($tvshow['first_air_date'])->format('M d, Y') : null,
                    'vote_average' => $tvshow['vote_average'] * 10 . '%'
                ]
                );
        });
    }


        // public function previous()
        // {
        //     return $this->page_accessed > 1 ? $this->page_accessed - 1 : null;
        // }

        // public function next()
        // {
        //     return $this->page_accessed < 500 ? $this->page_accessed + 1 : null;
        // }
        
}
