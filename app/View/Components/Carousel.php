<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousel extends Component
{
    public array $images = [
        'https://via.placeholder.com/500x250?text=Image%201',
        'https://via.placeholder.com/500x250?text=Image%202',
        'https://via.placeholder.com/500x250?text=Image%203',
        'https://via.placeholder.com/500x250?text=Image%204',
        'https://via.placeholder.com/500x250?text=Image%205',
        'https://via.placeholder.com/500x250?text=Image%206',
        'https://via.placeholder.com/500x250?text=Image%207',
        'https://via.placeholder.com/500x250?text=Image%208',
        'https://via.placeholder.com/500x250?text=Image%209',
        'https://via.placeholder.com/500x250?text=Image%2010',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel', [
            'images' => $this->images,
            'itemsPerSlide' => [
                'sm' => 1,
                'md' => 2,
                'lg' => 4,
            ],
        ]);
    }
}
