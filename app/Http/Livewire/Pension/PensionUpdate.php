<?php

namespace App\Http\Livewire\Pension;

use Livewire\Component;

use App\Models\Pension;

use App\Rules\AgeRule;
use App\Rules\CheckifNameExist;

class PensionUpdate extends Component
{

    public  $pension;

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
                 new CheckifNameExist($this->first_name, $this->last_name, $this->birthdate, $this->pension->id)
            ],
            'middle_name' => 'nullable|string|min:1|max:255',
            'last_name' => [
                'required',
                'string',
                'min:1',
                'max:255',
                 new CheckifNameExist($this->first_name, $this->last_name, $this->birthdate, $this->pension->id)
            ],
            'sex' => 'required|string',
            'province' => 'required|string',
            'municipality' => 'required|string',
            'barangay' => 'required|integer',
            'birthdate' => [
                 'required',
                 'date',
                 new AgeRule,
                 new CheckifNameExist($this->first_name, $this->last_name, $this->birthdate, $this->pension->id)
            ],
            'birthplace' => 'required|string|min:3|max:255',
            'marital_status' => 'nullable|string',
            'senior_citizen_id' => 'nullable|min:1|max:255',
        ];
    }

    public function updatedProvince($propertyName)
    {
        $this->municipality = null;
        $this->barangay = null;
    }

    public function updatedMunicipality($propertyName)
    {
        $this->barangay = null;
    }

    public function updated($propertyName)
    {
        $rules = $this->getRules();
        $this->validateOnly($propertyName, $rules);
    }

    public function getInit()
    {
        $this->last_name = $this->pension->last_name;
        $this->first_name = $this->pension->first_name;
        $this->middle_name = $this->pension->middle_name;
        $this->senior_citizen_id = $this->pension->senior_citizen_id;
        $this->sex = $this->pension->sex;
        $this->marital_status = $this->pension->marital_status;
        $this->province = $this->pension->province;
        $this->municipality = $this->pension->municipality;
        $this->barangay = $this->pension->barangay;
        $this->birthdate = $this->pension->birthdate;
        $this->birthplace = $this->pension->birthplace;
    }

    public function save()
    {
        $rules = $this->getRules();
        $validatedData = $this->validate($rules);
        $pension = $this->pension->update($validatedData);
        session()->flash('success', 'Info successfully udpated.');
    }

    public function mount(Pension $pension)
    {
        $this->pension = $pension;
        $this->getInit();
    }

    public function render()
    {
        return view('livewire.pension.pension-update');
    }

}
