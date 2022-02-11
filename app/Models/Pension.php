<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    use HasFactory;

    protected $table = 'tblpensionerinfo';

    protected $fillable = [
        'spid',
        'last_name',
        'first_name',
        'middle_name',
        'senior_citizen_id',
        'sex',
        'marital_status',
        'province',
        'municipality',
        'barangay',
        'birthdate',
        'birthplace',
    ];


    public static function getGender()
    {
        return collect( (object) array(
            (object) [ 'id' => "M", 'name' => 'M'],
            (object) [ 'id' => "F", 'name' => 'F'],
        ));
    }

    public static function getMaritalStatus()
    {
        return collect( (object) array(
            (object) [ 'id' => 'Single', 'name' => "Single" ],
            (object) [ 'id' => 'Married', 'name' => "Married" ],
            (object) [ 'id' => 'Widowed', 'name' => "Widowed" ],
        ));
    }

    public function getProvinceValueAttribute()
    {
        return Province::where('prov_code', $this->province)->get()->first()->prov_name ?? '';
    }

    public function getMunicipalityValueAttribute()
    {
        return Municipality::where('mun_code', $this->municipality)->get()->first()->mun_name ?? '';
    }

    public function getBarangayValueAttribute()
    {
        return Barangay::where('bar_code', $this->barangay)->get()->first()->bar_name ?? '';
    }

    public function scopeFilterSearch($query, $search)
    {
        if( !empty($search) ) {
            $query->where('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('spid', 'like', '%'.$search.'%');
        }
    }

   public function scopeFilterSex($query, $gender)
    {
        if( !empty($gender) ) {
            $query->where('sex', strtoupper($gender));
        }
    }

   public function scopeFilterMartiralStatus($query, $status)
    {
        if( !empty($status) ) {
            $query->where('marital_status', strtoupper($status));
        }
    }

}
