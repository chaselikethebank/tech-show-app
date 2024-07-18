<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LinkWithArrow extends Component
{
    public $route;
    public $attributes;

    public function __construct($route, $attributes = [])
    {
        $this->route = $route;
        $this->attributes = $attributes;
    }

    public function render()
    {
        return view('components.link-with-arrow');
    }
}
