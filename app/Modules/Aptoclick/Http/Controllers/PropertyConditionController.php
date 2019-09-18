<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Modules\Aptoclick\Repositories\PropertyConditionRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class PropertyConditionController extends ApiResourceController
{
    protected $repository = PropertyConditionRepository::class;

    protected $resourceName = 'property-conditions';
}
