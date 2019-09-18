<?php

namespace Raffles\Modules\Aptoclick\Repositories;

use Raffles\Modules\Aptoclick\Models\User;

use Caffeinated\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = User::class;

    /**
     * @var array
     */
    public $tag = ['User'];
}
