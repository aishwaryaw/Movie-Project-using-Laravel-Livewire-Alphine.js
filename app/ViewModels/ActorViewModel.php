<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class ActorViewModel extends ViewModel
{
    public $actor;
    public $combined_credits;
    public $social;


    public function __construct($actor, $combined_credits, $social)
    {
        $this->actor = $actor;
        $this->combined_credits = $combined_credits;
        $this->social = $social;
    }

    //getting actor basic details
    public function actor(){

    
        return collect($this->actor)->merge(
            [
                'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
                'age' => Carbon::parse($this->actor['birthday'])->age,

                'profile_path' => $this->actor['profile_path'] ?
                'https://image.tmdb.org/t/p/w500/'.$this->actor['profile_path'] :
                'https://via.placeholder.com/300x450'
            ]);
        }


    //getting social links
    public function social(){
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id'] : null,
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id'] : null,
        ])->only([
            'facebook', 'instagram', 'twitter',
    
        ]);
    }

    //getting famous movies or tv shows of that person
    public function combined_credits(){

        $title = "";

        return collect($this->combined_credits['cast'])->sortByDesc('popularity')
        ->map(function($cast){

            if (isset($cast['title'])) {
                $title = $cast['title'];
            } elseif (isset($cast['name'])) {
                $title = $cast['name'];
            } else {
                $title = 'Untitled';
            }



            return collect($cast)->merge(
                [
                'title' => $title,
                  'poster_path' => $cast['poster_path'] ? 'https://image.tmdb.org/t/p/w300/'.$cast['poster_path'] :
                  'https://via.placeholder.com/300x450',

                  'linkToPage' => $cast['media_type'] === 'movie' ? route('movies.show', $cast['id']) : route('TVShows.show', $cast['id'])
                ]
                );

        });
 
}


    //getting timeline of famous movies or tv shows of that person
    public function knownFor(){

        return collect($this->combined_credits['cast'])
        ->map(function($cast){

            if(isset($cast['release_date'])){
                $date = $cast['release_date'];
            }
            else if(isset($cast['first_air_date'])){
                $date = $cast['first_air_date'];
            }
            else{
                $date = '';
            }

            if (isset($cast['title'])) {
                $title = $cast['title'];
            } elseif (isset($cast['name'])) {
                $title = $cast['name'];
            } else {
                $title = 'Untitled';
            }


            return collect($cast)->merge(
                [
                'title' => $title,
                'year'=> isset($date) ? Carbon::parse($date)->format('Y') : "future" ,
                'character'=> isset($cast['character']) ? $cast['character'] : '',
                'linkToPage' => $cast['media_type'] === 'movie' ? route('movies.show', $cast['id']) : route('TVShows.show', $cast['id'])
                ]
                );

        })->sortByDesc('release_date');
    
    }

}