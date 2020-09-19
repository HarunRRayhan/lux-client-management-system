<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavMenuSubItem extends Component
{
    /**
     * Name of the menu item.
     * @var string
     */
    public string $name;

    /**
     * Route Name.
     * @var string
     */
    public string $route;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $route
     */
    public function __construct(string $name, string $route)
    {
        $this->name = $name;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.nav.menu-sub-item');
    }
}
