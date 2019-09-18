<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Http\Controllers\Controller;
use Raffles\Modules\Aptoclick\Http\Requests\ValorizeRequest;
use Raffles\Modules\Aptoclick\Mail\ValorizeMessage;

use Illuminate\Support\Facades\Mail;
use RafflesArgentina\ResourceController\Traits\FormatsValidJsonResponses;

class ValorizeController extends Controller
{
    use FormatsValidJsonResponses;

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ValorizeRequest $request)
    {
        $data = $request->all();

        Mail::cc(env('TINSA_MAIL_CC'))->to(env('TINSA_MAIL_TO'))->send(new ValorizeMessage($data));

        return $this->validSuccessJsonResponse('Success', $data);
    }
}
