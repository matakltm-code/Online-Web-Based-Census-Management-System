<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getAge($date)
    {
        $dob = new DateTime($date);
        $now = new DateTime();
        $difference = $now->diff($dob);
        $age = $difference->y;
        return  $age;
    }

    // Change M OR F to string
    public function getSexAttribute($value)
    {
        return ($value === 'M' ? 'Male' : 'Femail');
    }

    public function getIsMigrantAttribute($value)
    {
        return $value ? 'Yes' : 'No';
    }

    public function getIsDisableAttribute($value)
    {
        return $value ? 'Yes' : 'No';
    }

    public function getIsOrphanAttribute($value)
    {
        return $value ? 'Yes' : 'No';
    }

    public function getIsLiterateAttribute($value)
    {
        return $value ? 'Yes' : 'No';
    }

    public function getMaritalStatusAttribute($value)
    {
        return ucfirst($value);
    }

    public function getHaveIncomeAttribute($value)
    {
        return $value ? 'Yes' : 'No';
    }







    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }


    public function p_region()
    {
        return $this->hasOne(Region::class, 'id', 'p_region_id');
    }

    public function religion()
    {
        return $this->hasOne(Religion::class, 'id', 'religion_id');
    }
}
