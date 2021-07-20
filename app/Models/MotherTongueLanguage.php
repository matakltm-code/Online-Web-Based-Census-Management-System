<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherTongueLanguage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];


    public function members()
    {
        return $this->hasMany(Member::class, 'mother_tongue_language_id', 'id');
    }
}
