<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // Table
    protected $table = 'users';
    // Primary Key
    protected $primaryKey = 'id';
    // created_at and updated_at
    public $timestamps = true;
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * $user = User::find(1);
     * $user->is_admin; // true or false
     * $user->is_supervisor; // true or false
     * $user->is_enumerator; // true or false
     * $user->is_resident; // true or false
     */
    // UserTypes in user_type column: // admin, supervisor, enumerator, resident
    public function getIsAdminAttribute()
    {
        return auth()->user()->user_type == 'admin';
    }
    public function getIsSupervisorAttribute()
    {
        return auth()->user()->user_type == 'supervisor';
    }
    public function getIsEnumeratorAttribute()
    {
        return auth()->user()->user_type == 'enumerator';
    }
    public function getIsResidentAttribute()
    {
        return auth()->user()->user_type == 'resident';
    }


    public function account_type_text($user_type)
    {
        $result = '';
        if ($user_type == 'admin') {
            $result = 'Adminstrator';
        }
        if ($user_type == 'supervisor') {
            $result = 'Supervisor';
        }
        if ($user_type == 'enumerator') {
            $result = 'Enumerator';
        }
        if ($user_type == 'resident') {
            $result = 'Resident';
        }


        return $result;
    }


    /**
     * Get the region associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
