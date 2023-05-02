<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavTabs extends Component
{
    public array $tabs;

    public function __construct($tabs)
    {
        $this->tabs = $tabs;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Htmlable|Closure|string|Application
    {
        return view('components.nav-tabs');
    }
}
