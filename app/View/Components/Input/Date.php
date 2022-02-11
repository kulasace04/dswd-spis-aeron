<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Date extends Component
{

    public $name, $label, $sublabel;

    public function __construct($name, $label, $sublabel=null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->sublabel = $sublabel;
    }

    public function render()
    {
        return view('components.input.date');
    }
}
