<?php

namespace App\View\Components\Panel\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class RolesButton extends Component
{
    public $roles;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->roles = Role::count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.sidebar.roles-button');
    }
}
