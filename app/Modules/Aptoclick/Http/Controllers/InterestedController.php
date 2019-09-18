<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers;

use Raffles\Http\Controllers\Controller;
use Raffles\Modules\Aptoclick\Http\Requests\InterestedRequest;
use Raffles\Modules\Aptoclick\UseCases\HandleInterestedInProperty;
use Raffles\Modules\Aptoclick\Repositories\PropertyRepository;

use Illuminate\Support\Facades\Mail;
use RafflesArgentina\ResourceController\Traits\FormatsValidJsonResponses;

class InterestedController extends Controller
{
    use FormatsValidJsonResponses;

    /**
     * Where to redirect users after submitting the contact form.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * The InterestedRepository object.
     *
     * @var InterestedRepository
     */
    protected $repository;

    /**
     * Create a new InterestedController instance.
     *
     * @param InterestedRepository $repository
     *
     * @return void
     */
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  InterestedRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(InterestedRequest $request, $id)
    {
        $data = $request->all();
        $property = $this->repository->find($id);

        try {
            $this->dispatchNow(new HandleInterestedInproperty($property, $data));
        }  catch(\Exception $e) {
            return $this->validInternalServerErrorJsonResponse($e, $e->getMessage());
        }

        return $this->validSuccessJsonResponse('Success', [], $this->redirectPath());
    }
}
