<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Modules\Aptoclick\Repositories\PropertyTypeRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class PropertyTypeController extends ApiResourceController
{
    protected $repository = PropertyTypeRepository::class;

    protected $resourceName = 'property-types';
}
