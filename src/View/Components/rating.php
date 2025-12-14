<?php

namespace MrShaneBarron\rating\View\Components;

use Illuminate\View\Component;

class rating extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('ld-rating::components.rating');
    }
}
