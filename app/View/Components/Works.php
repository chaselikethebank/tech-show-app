<?php

namespace App\View\Components;

use App\Models\Tech;
use App\Models\Vehicle;
use App\Models\Work;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Works extends Component
{
    public Collection $works;
    public Collection $technicians;
    public Collection $vehicles;
    /**
     * Create a new component instance.
     */
    public function __construct(
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
