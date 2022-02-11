<?php

namespace App\Http\Livewire\Pension;

use Livewire\Component;

use App\Models\Pension;

use App\Rules\AgeRule;
use App\Rules\CheckifNameExist;

class PensionCreate extends Component
{

    public  $last_name,
            $first_name,
            $middle_name,
            $senior_citizen_id,
            $sex,
            $marital_status,
            $province,
            $municipality,
            $barangay,
            $birthdate,
            $birthplace;

    public function getRules()
    {
        return [
            'first_name' => [
                'required',
                'string',
                'min:1',
                'max:255',
                 new CheckifNameExist($this->first_name, $this->last_name, $this->birthdate)
            ],
            'middle_name' => 'nullable|string|min:1|max:255',
            'last_name' => [
                'required',
                'string',
                'min:1',
                'max:255',
                 new CheckifNameExist($this->first_name, $this->last_name, $this->birthdate)
            ],
            'sex' => 'required|string',
            'province' => 'required|string',
            'municipality' => 'required|string',
            'barangay' => 'required|integer',
            'birthdate' => [
                 'required',
                 'date',
                 new AgeRule,
                 new CheckifNameExist($this->first_name, $this->last_name, $this->birthdate)
            ],
            'birthplace' => 'required|string|min:3|max:255',
            'marital_status' => 'nullable|string',
            'senior_citizen_id' => 'nullable|min:1|max:255',
        ];
    }

    public function updated($propertyName)
    {
        $rules = $this->getRules();
        $this->validateOnly($propertyName, $rules);
    }

    public function submit()
    {
        $rules = $this->getRules();
        $validatedData = $this->validate($rules);
        $increment = Pension::get()->count();

        $pension = Pension::create(array_merge($validatedData, [
            'spid' => 'SP'.$this->barangay.'-'.str_pad($increment + 1,3,"0", STR_PAD_LEFT)]
        ));
        redirect()->route('pension.index');
    }

    public function render()
    {
        return view('livewire.pension.pension-create');
    }
}
