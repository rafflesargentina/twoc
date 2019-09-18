<?php

namespace Raffles\Modules\Aptoclick\Repositories;

use Raffles\Modules\Aptoclick\Models\Facility;

use Caffeinated\Repository\Repositories\EloquentRepository;

class FacilityRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Facility::class;

    /**
     * @var array
     */
    public $tag = ['Facility'];
}
