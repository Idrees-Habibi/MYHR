<?php

namespace App\View\Components\general;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChatRating extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $rating;

    public function __construct($rating)
    {
        $this->rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.general.chat-rating');
    }
}
