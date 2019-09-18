<?php

namespace Raffles\Modules\Aptoclick\Repositories;

use Raffles\Modules\Aptoclick\Models\PropertyType;

use Caffeinated\Repository\Repositories\EloquentRepository;

class PropertyTypeRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = PropertyType::class;

    /**
     * @var array
     */
    public $tag = ['PropertyType'];
}
