<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class doctor extends Component

{
    public $doctors;
    /**
     * Create a new component instance.
     */
    public function __construct($doctors)
    {
        $this->doctors = $doctors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.doctor');
    }
}
