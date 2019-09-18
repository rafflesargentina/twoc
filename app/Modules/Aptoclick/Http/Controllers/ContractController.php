<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Http\Controllers\Controller;
use Raffles\Modules\Aptoclick\Repositories\PropertyRepository;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    protected $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        $property = $this->repository->find($id);
        $user = $property->user->toArray();

        $data = [
            'user' => $user,
            'property' => $property->toArray(),
        ];

        return view('aptoclick::contract', compact('data', $data));
    }
}
