<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Pension;

class Filter extends Component
{
    public $options;
    public $label;
    public $sortLabel;
    public $sublabel;
    public $typeData;
    public $attribute;

    public function __construct($option, $sort, $attribute = null, $label=null, $sortLabel=null)
    {
        $this->attribute = $attribute;
        $this->label = $label ?? ucfirst($option);
        $this->sublabel = $this->getOptionName($option, $sort);
        $this->options = $this->getOptions($option);
        $this->typeData = $option;
        $this->sortLabel = $sortLabel;
    }

    public function getOptionName($option, $sort) {
        if ($option == "status") {
            return $sort ? ucfirst(Pension::getMaritalStatus()->where('id', $sort)->first()->name) : "All";
        }elseif ($option == "gender") {
            return $sort ? ucfirst(Pension::getGender()->where('id', $sort)->first()->name) : "All";
        }
    }

    public function getOptions($option) {
        if ($option == "status") {
            return Pension::getMaritalStatus();
        }elseif ($option == "gender") {
            return Pension::getGender();
        }
    }

    public function render()
    {
        return view('components.filter');
    }
}
