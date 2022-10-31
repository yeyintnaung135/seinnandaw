<?php

namespace App\View\Components;

use Illuminate\View\Component;

class minibackheader extends Component
{
    public $maintext;
    public $subtext;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($maintext,$subtext)
    {
        //
        $this->maintext=$maintext;
        $this->subtext=$subtext;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.minibackheader');
    }
}
