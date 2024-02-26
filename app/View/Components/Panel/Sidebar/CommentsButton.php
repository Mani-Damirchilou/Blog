<?php

namespace App\View\Components\Panel\Sidebar;

use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentsButton extends Component
{
    public $comments;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->comments = Comment::count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.sidebar.comments-button');
    }
}
