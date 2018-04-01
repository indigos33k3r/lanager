<?php

namespace Zeropingheroes\Lanager;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Check if the user has the specified role(s)
     * @param array $roles
     * @return bool
     * @internal param $role
     */
    public function hasRole(...$roles)
    {
        // if ($this->roles()->whereIn('name', $roles)->first()) {
        //     return true;
        // }
        return false;
    }

}
