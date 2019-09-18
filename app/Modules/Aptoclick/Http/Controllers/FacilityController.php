<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Modules\Aptoclick\Repositories\FacilityRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class FacilityController extends ApiResourceController
{
    protected $repository = FacilityRepository::class;

    protected $resourceName = 'facilities';
}
