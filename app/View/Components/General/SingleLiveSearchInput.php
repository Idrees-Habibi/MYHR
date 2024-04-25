<?php

namespace App\View\Components\General;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleLiveSearchInput extends Component
{
    /**
     * Create a new component instance.
     */
    public string $entangle = '';

    public bool $multiple = false;

    public string $inputName = '';

    public string $eventName = '';

    public string $label = '';

    public string $searchInputName = '';

    public function __construct(
        $entangle = '',
        $inputName = '',
        $eventName = '',
        $label = '',
        $searchInputName = '',
        public array $options = []
    ) {
        $this->entangle = $entangle;
        $this->inputName = $inputName;
        $this->eventName = $eventName;
        $this->label = $label;
        $this->searchInputName = $searchInputName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.general.single-live-search-input');
    }
}
