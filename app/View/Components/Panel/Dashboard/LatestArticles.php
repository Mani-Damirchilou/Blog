<?php

namespace App\View\Components\Panel\Dashboard;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestArticles extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->articles = Article::latest()->take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.dashboard.latest-articles');
    }
}
