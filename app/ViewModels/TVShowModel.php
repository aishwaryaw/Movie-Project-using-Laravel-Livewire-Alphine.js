<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class TVShowModel extends ViewModel
{

    public $show;

    public function __construct($show)
    {
        $this->show = $show;
    }

    public function show(){
        return collect($this->show)->merge(
            [
                'poster_path' => $this->show['poster_path'] ? 'https://image.tmdb.org/t/p/w500/'.$this->show['poster_path'] :'https://via.placeholder.com/300x450',
                'first_air_date' => Carbon::parse($this->show['first_air_date'])->format('M d, Y'),
                'vote_average' => $this->show['vote_average'] * 10 . '%',
                'genres'=> collect($this->show['genres'])->pluck('name')->flatten()->implode(', '),
                'crew'=>  collect($this->show['credits']['crew'])->take(2) ,
                'cast'=> collect($this->show['credits']['cast'])->take(5)->map(function($cast){
                    return collect($cast)->merge([
                        'profile_path' => $cast['profile_path'] ?  
                        'https://image.tmdb.org/t/p/w500/'.$cast['profile_path'] : 'https://via.placeholder.com/300x450'
                        
                    ]);
                }),
                'images'=> collect($this->show['images']['backdrops'])->take(9)
                
            ]
            );
    }
}
