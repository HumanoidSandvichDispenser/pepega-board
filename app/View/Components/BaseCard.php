<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseCard extends Component
{
    public $isSubcard = false;

    public function __construct(bool $isSubcard = false)
    {
        $this->isSubcard = $isSubcard;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base-card');
    }
}
