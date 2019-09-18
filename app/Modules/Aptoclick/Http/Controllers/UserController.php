<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Modules\Aptoclick\Repositories\UserRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class UserController extends ApiResourceController
{
    protected $repository = UserRepository::class;

    protected $resourceName = 'users';

    /**
     * Display the specified resource.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        $model->load('properties');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }
}
