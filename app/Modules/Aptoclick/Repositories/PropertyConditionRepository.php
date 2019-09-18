<?php

namespace Raffles\Modules\Aptoclick\Repositories;

use Raffles\Modules\Aptoclick\Models\PropertyCondition;

use Caffeinated\Repository\Repositories\EloquentRepository;

class PropertyConditionRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = PropertyCondition::class;

    /**
     * @var array
     */
    public $tag = ['PropertyCondition'];
}
