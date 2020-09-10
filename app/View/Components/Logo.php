<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{
    /**
     * Theme of the logo. Available options: 'light', 'dark'.
     * @var string
     */
    public string $theme;

    public string $fillColor = '#6875F5';

    /**
     * Create a new component instance.
     *
     * @param $theme
     */
    public function __construct(string $theme = 'dark')
    {
        $this->theme = $theme;
        $this->setProps();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.logo');
    }

    protected function setProps()
    {
        if ('light' === $this->theme) {
            $this->fillColor = '#FFFFFF';
        }
    }
}
