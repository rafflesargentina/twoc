<?php

namespace Raffles\Modules\Aptoclick\Models;

use Raffles\Models\User as Model;

class User extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'curp',
        'email',
        'first_name',
        'last_name',
        'password',
        'rfc',
        'slug'
    ];

    /**
     * Get the properties for the user.
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
