<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TVShowsList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tvshows;
    public $topRatedShows;
    // public $previous;
    // public $next;

    public function __construct($tvshows , $topRatedShows)
    {
        $this->tvshows = $tvshows;
        $this->topRatedShows = $topRatedShows;
        //$this->previous = $previous;
       // $this->next = $next;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tv-shows-list');
    }
}
