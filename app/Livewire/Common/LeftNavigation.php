<?php

namespace App\Livewire\Common;

use Livewire\Component;

class LeftNavigation extends Component
{
    public $modules = [];

    public function render()
    {
        return view('livewire.common.left-navigation');
    }
}
