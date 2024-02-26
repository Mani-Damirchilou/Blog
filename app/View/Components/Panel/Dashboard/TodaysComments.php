<?php

namespace App\View\Components\Panel\Dashboard;

use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodaysComments extends Component
{
    public $comments;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->comments = Comment::where('created_at', '>', now()->subDays(7))->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.dashboard.todays-comments');
    }
}
