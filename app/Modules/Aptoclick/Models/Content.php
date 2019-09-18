<?php

namespace Raffles\Modules\Aptoclick\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'slug',
    ];
}
