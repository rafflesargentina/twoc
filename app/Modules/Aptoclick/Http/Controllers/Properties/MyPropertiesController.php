<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers\Properties;

use Raffles\Http\Controllers\Controller;
use Raffles\Modules\Aptoclick\Repositories\PropertyRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\Traits\FormatsValidJsonResponses;

class MyPropertiesController extends Controller
{
    use FormatsValidJsonResponses;

    /**
     * The PropertyRepository object.
     *
     * @var PropertyRepository
     */
    protected $repository;

    /**
     * Create a new MyPropertiesController instance.
     *
     * @param PropertyRepository $repository The PropertyRepository object.
     */
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $user = $request->user('api');

        $items = $user->properties;
    
        return $this->validSuccessJsonResponse('Success', $items);
    }
}
