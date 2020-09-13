<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavMenuSubmenu extends Component
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
     * Active Route Match for auto open/close submenu
     *
     * @var string
     */
    public string $active;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $route
     * @param string $icon
     * @param string $active
     */
    public function __construct( string $name, string $route, string $icon, string $active )
    {
        $this->name   = $name;
        $this->route  = $route;
        $this->icon   = $icon;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view( 'components.nav.menu-submenu' );
    }
}
