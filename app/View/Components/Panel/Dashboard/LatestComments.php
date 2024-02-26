<?php

namespace App\View\Components\Panel\Dashboard;

use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestComments extends Component
{
    public $comments;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->comments = Comment::with('user','article')->latest()->take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.dashboard.latest-comments');
    }
}
