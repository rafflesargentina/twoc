<?php

namespace Raffles\Modules\Aptoclick\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'name',
        'slug',
    ];

    /**
     * The properties that belong to the facility.
     */
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
