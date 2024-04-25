<?php

namespace App\View\Components\general;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $click;

    public $target;

    public $class;

    public $text;

    public function __construct($click, $target, $class, $text)
    {
        $this->click = $click;
        $this->target = $target;
        $this->class = $class;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.general.modal-button');
    }
}
