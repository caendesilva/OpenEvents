<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class DynNavLink extends Component
{
    public string $href;
    public string $name;
    public bool $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $for, ?string $name = null)
    {
        $this->href = route($for);
        $this->name = $name ?? Str::title($for);
        $this->active = request()->routeIs($for);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dyn-nav-link');
    }
}
