<?php

namespace App\View\Components\General;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectCannedInput extends Component
{
    public string $entangle = '';

    public bool $multiple = false;

    public string $inputName = '';

    public string $eventName = '';

    public string $label = '';

    public function __construct(
        $entangle = '',
        $inputName = '',
        $eventName = '',
        $label = '',
        public array $options = []
    ) {
        $this->entangle = $entangle;
        $this->inputName = $inputName;
        $this->eventName = $eventName;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.general.select-canned-input');
    }
}
