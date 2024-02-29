<?php

namespace App\View\Components\Panel\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TotalViews extends Component
{
    public $views;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->views = \App\Models\View::count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.dashboard.total-views');
    }
}
