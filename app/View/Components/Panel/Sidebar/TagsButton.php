<?php

namespace App\View\Components\Panel\Sidebar;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagsButton extends Component
{
    public $tags;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tags = Tag::count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.sidebar.tags-button');
    }
}
