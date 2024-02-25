<?php

namespace App\View\Components\Panel\Sidebar;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticlesButton extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->articles = Article::count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.sidebar.articles-button');
    }
}
