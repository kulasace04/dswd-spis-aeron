<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Pension;

class CheckIfNameExist implements Rule
{

    public $first_name, $last_name, $birthdate, $id;

    public function __construct($first_name = null, $last_name = null, $birthdate = null, $id = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthdate = $birthdate;
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {
        if ($this->first_name && $this->last_name && $this->birthdate) {
                $pension = Pension::where('first_name', $this->first_name)
                                    ->where('last_name', $this->last_name)
                                    ->where(function($query){
                                        if ($this->id) {
                                            $query->where('id', '<>' ,$this->id);
                                        }
                                    })
                                    ->whereDate('birthdate', $this->birthdate)->get()->count();
                return  $pension <= 0;
        }else{
            return true;
        }
    }


    public function message()
    {
        return 'The pensionist is already exist';
    }
}
