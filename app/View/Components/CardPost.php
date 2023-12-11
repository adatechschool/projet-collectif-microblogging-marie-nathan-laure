<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardPost extends Component
{
    public $title;
    public $image;
    public $description;

    public function __construct($title, $image, $description)
    {
        $this->title = $title;
        $this->image = $image;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-post');
    }
}
