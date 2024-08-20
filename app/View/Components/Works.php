<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Works extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $works = [],
        public array $technicians = [],
        public array $vehicles = [],
    ) {

        
        $this->works = Work::all();
        $this->technicians = Tech::all();
        $this->vehicles = Vehicle::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
         return view('components.works');
    }
}
