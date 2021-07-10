<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the memebers for the House
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(Member::class, 'house_id', 'id');
    }


    /**
     * Get all of the deaths for the House
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deaths()
    {
        return $this->hasMany(Death::class, 'house_id', 'id');
    }
}
