<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardPost extends Component
{

    public $user_id;
    public $createdAt;
    public $image;
    public $description;

    public function __construct($image, $description, $user_id, $createdAt)
    {
        $this->user_id = $user_id;
        $this->createdAt = $createdAt;
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
