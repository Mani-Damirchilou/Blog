<?php

namespace App\View\Components\Panel\Dashboard;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewUsers extends Component
{
    public $users;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->users = User::where('created_at', '>', now()->subDays(7))->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.dashboard.new-users');
    }
}
