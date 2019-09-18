<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Illuminate\Http\Request;

use Raffles\Http\Controllers\Controller;
use RafflesArgentina\ResourceController\Traits\FormatsValidJsonResponses;

class AccountController extends Controller
{
    use FormatsValidJsonResponses;

    /**
     * Get the account for the authenticated user.
     *
     * @param Request $request The request object.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        abort_if(!$user, 401);

        $user->load('address', 'contact', 'properties');

        return $this->validSuccessJsonResponse('Success', ['user' => $user]);
    }
}
