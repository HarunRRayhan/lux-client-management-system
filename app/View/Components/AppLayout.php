<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $pagename;

    /**
     * Create a new component instance.
     *
     * @param $pagename
     */
    public function __construct( $pagename )
    {
        $this->pagename = $pagename;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view( 'layouts.app' );
    }
}
