<?php

namespace Raffles\Modules\Aptoclick\Repositories;

use Raffles\Modules\Aptoclick\Models\Property;

use Caffeinated\Repository\Repositories\EloquentRepository;

class PropertyRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Property::class;

    /**
     * @var array
     */
    public $tag = ['Property'];
}
