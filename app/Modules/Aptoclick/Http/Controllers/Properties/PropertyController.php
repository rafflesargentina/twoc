<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers\Properties;

use Raffles\Modules\Aptoclick\Http\Requests\PropertyRequest;
use Raffles\Modules\Aptoclick\Models\FeaturedPhoto;
use Raffles\Modules\Aptoclick\Repositories\PropertyRepository;
use Raffles\Modules\Aptoclick\UseCases\HandlePropertyCreation;

use DB;
use Illuminate\Database\Eloquent\{ Model, Relations\Relation };
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use RafflesArgentina\ResourceController\ApiResourceController;
use RafflesArgentina\ResourceController\Exceptions\ResourceControllerException;

class PropertyController extends ApiResourceController
{
    use DispatchesJobs;

    protected $formRequest = PropertyRequest::class;

    protected $repository = PropertyRepository::class;

    protected $resourceName = 'properties';

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

        $model->load('amenities', 'contact', 'facilities', 'map', 'property_type', 'unfeatured_photos');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }

        /**
         * Store a newly created resource in storage.
         *
         * @param Request $request The request object.
         *
         * @throws ResourceControllerException
         *
         * @return \Illuminate\Http\JsonResponse
         */
    public function store(Request $request)
    {
        $this->getFormRequestInstance();

        $daysAvailable = $request->days_available;
        if ($daysAvailable) {
            $merge = ['days_available' => json_encode($daysAvailable)];
            $request->merge($merge);
        }

        $user = $request->user('api');
        $request->merge(['user_id' => $user->id]);

        DB::beginTransaction();
        try {
            $instance = $this->repository->create($request->all());
            $model = $instance[1];
            $number = $model->{$model->getRouteKeyName()};
            $mergedRequest = $this->uploadFiles($request, $model);
            $this->updateOrCreateRelations($mergedRequest, $model);
        } catch (\Exception $e) {
            DB::rollback();

            $message = $this->storeFailedMessage($e->getMessage());
            throw new ResourceControllerException($message);
        }

        DB::commit();

        $this->dispatchNow(new HandlePropertyCreation($model, $user));

        $message = $this->storeSuccessfulMessage($number);
        $data = [$model];

        return $this->validSuccessJsonResponse($message, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @throws ResourceControllerException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $key)
    {
        $this->getFormRequestInstance();

        $daysAvailable = $request->days_available;
        if ($daysAvailable) {
            $merge = ['days_available' => json_encode($daysAvailable)];
            $request->merge($merge);
        }

        $user = $request->user('api');    
        $request->merge(['user_id' => $user->id]);

        $model = $this->findFirstByKey($key);

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        DB::beginTransaction();

        try {
            $instance = $this->repository->update($model, $request->all());
            $model = $instance[1];
            $mergedRequest = $this->uploadFiles($request, $model);
            $this->updateOrCreateRelations($mergedRequest, $model);
        } catch (\Exception $e) {
            DB::rollback();

            $message = $this->updateFailedMessage($key, $e->getMessage());
            throw new ResourceControllerException($message);
        }

        DB::commit();

        $message = $this->updateSuccessfulMessage($key);
        $data = [$model];

        return $this->validSuccessJsonResponse($message, $data);
    }

    /**
     * Get items collection.
     *
     * @param string $orderBy The order key.
     * @param string $order   The order direction.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getItemsCollection($orderBy = 'updated_at', $order = 'desc')
    {
        //if ($this->useSoftDeletes) {
            //return $this->repository->withTrashed()->orderBy($orderBy, $order)->get();
        //}

        return $this->repository->filter()->sort()->get();
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'properties/';
    }
}
