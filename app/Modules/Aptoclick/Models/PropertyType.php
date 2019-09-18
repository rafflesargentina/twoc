<?php

namespace Raffles\Modules\Aptoclick\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
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
     * Get the properties for the property type.
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
