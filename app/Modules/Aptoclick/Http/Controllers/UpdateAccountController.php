<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Modules\Aptoclick\Http\Requests\AccountRequest;
use Raffles\Modules\Aptoclick\Repositories\UserRepository;

use Raffles\Http\Controllers\Controller;
use RafflesArgentina\ResourceController\Traits\FormatsValidJsonResponses;

class UpdateAccountController extends Controller
{
    use FormatsValidJsonResponses;

    /**
     * Update the account for the authenticated user.
     *
     * @param AccountRequest $request    The AccountRequest object.
     * @param UserRepository $repository The UserRepository object.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AccountRequest $request, UserRepository $repository)
    {
        $user = $request->user();

        $repository->update($user, $request->all());
        $user->contact()->update($request->contact);
     

        return $this->validSuccessJsonResponse('Success', ['user' => $user->refresh()]);
    }
}
