<?php

namespace App\Http\Livewire\Pension;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Pension;

class PensionList extends Component
{

    use WithPagination;

    public $search,
            $gender,
            $status;

    protected $queryString = [
        'search' => ['except' => ''],
        'gender' => ['except' => ''],
        'status' => ['except' => ''],
        'page' => ['except' => ''],
    ];

    public function filterData($paramType, $option)
    {
        $this->{$paramType} = $option;
        $this->resetPage();
    }

    public function render()
    {
        $pensions = Pension::filterSearch($this->search)
                        ->filterSex($this->gender)
                        ->filterMartiralStatus($this->status)
                        ->latest()
                        ->orderBy('spid', 'DESC')
                        ->paginate(20);
        return view('livewire.pension.pension-list', compact('pensions'));
    }

}
