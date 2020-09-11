<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavMenuItem extends Component
{
    /**
     * Name of the menu item
     * @var string
     */
    public string $name;

    /**
     * Route Name
     * @var string
     */
    public string $route;

    /**
     * Icon Name from Icons Directory
     *
     * @var string
     */
    public string $icon;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $route
     * @param string $icon
     */
    public function __construct( string $name, string $route, string $icon )
    {
        $this->name  = $name;
        $this->route = $route;
        $this->icon  = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view( 'components.nav.menu-item' );
    }
}
