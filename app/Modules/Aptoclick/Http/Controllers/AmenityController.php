<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Modules\Aptoclick\Repositories\AmenityRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class AmenityController extends ApiResourceController
{
    protected $repository = AmenityRepository::class;

    protected $resourceName = 'amenities';
}
