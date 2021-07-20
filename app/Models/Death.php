<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;
    protected $guarded = [];


    // Date of death - Date of birth ==> age
    public function getAliveAge($death_date, $birth_date)
    {
        $date_of_birth = new DateTime($birth_date);
        $date_of_death = new DateTime($death_date);
        $difference = $date_of_death->diff($date_of_birth);
        $age = $difference->y;
        return  $age;
    }

    // Change M OR F to string
    public function getSexAttribute($value)
    {
        return ($value === 'M' ? 'Male' : 'Femail');
    }
}
