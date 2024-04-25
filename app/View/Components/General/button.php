<?php

namespace App\View\Components\General;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class button extends Component
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

    public $icon;

    public $attribute;

    public function __construct($click, $target, $class, $text, $icon, $attribute)
    {
        $this->click = $click;
        $this->target = $target;
        $this->class = $class;
        $this->text = $text;
        $this->icon = $icon;
        $this->attribute = $attribute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.general.button');
    }
}
