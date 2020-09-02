<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TVShowCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $show;

    public function __construct($show)
    {
        $this->show = $show;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tv-show-card');
    }
}
