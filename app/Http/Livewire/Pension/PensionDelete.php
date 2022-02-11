<?php

namespace App\Http\Livewire\Pension;

use Livewire\Component;

use App\Models\Pension;

class PensionDelete extends Component
{

    public $pension;

    public function remove()
    {
        $this->pension->delete();
        redirect()->route('pension.index');
    }

    public function mount(Pension $pension)
    {
        $this->pension = $pension;
    }

    public function render()
    {
        return view('livewire.pension.pension-delete');
    }

}
