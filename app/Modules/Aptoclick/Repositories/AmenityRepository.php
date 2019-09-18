<?php

namespace Raffles\Modules\Aptoclick\Repositories;

use Raffles\Modules\Aptoclick\Models\Amenity;

use Caffeinated\Repository\Repositories\EloquentRepository;

class AmenityRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Amenity::class;

    /**
     * @var array
     */
    public $tag = ['Amenity'];
}
