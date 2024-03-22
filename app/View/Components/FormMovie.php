<?php

namespace App\View\Components;

use App\Models\Country;
use App\Models\Movie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormMovie extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $btnText, 
        public Movie $movie,
        public $countries
        )
    { }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-movie');
    }
}
