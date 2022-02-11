<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\Pension;

class Select extends Component
{

    public $name, $label, $sublabel, $options, $attribute, $custom, $selection;

    public function __construct($name, $label, $option, $sublabel=null, $attribute=null, $custom=false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->custom = $custom;
        $this->sublabel = $sublabel;
        $this->attribute = $attribute;
        $this->selection = $option;
        $this->options = $this->getOptions($option, $attribute);
    }

    public function getOptions($option) {
        if ($option == "gender") {
            return Pension::getGender();
        }elseif ($option == "maritalStatus") {
            return Pension::getMaritalStatus();
        }elseif ($option == "province") {
            return Province::get(['prov_code  as id', 'prov_name  as name']);
        }elseif ($option == "municipality") {
            return Municipality::where('prov_code', $this->attribute)->get(['mun_code  as id', 'mun_name  as name']);
        }elseif ($option == "barangay") {
            return Barangay::where('mun_code', $this->attribute)->get(['bar_code  as id', 'bar_name  as name']);
        }else{
            return [];
        }
    }

    public function render()
    {
        return view('components.input.select');
    }
}
