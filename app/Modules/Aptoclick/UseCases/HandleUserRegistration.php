<?php

namespace Raffles\Modules\Aptoclick\UseCases;

use Raffles\Modules\Aptoclick\Models\User;
use Raffles\Modules\Aptoclick\Notifications\Admin\NewUserRegistered;
use Raffles\Modules\Aptoclick\Repositories\UserRepository;

use Illuminate\Foundation\Bus\Dispatchable;

class HandleUserRegistration
{
    use Dispatchable;

    /**
     * The User model.
     *
     * @var User $user
     */
    protected $user;

    /**
     * Create a new job instance.
     *
     * @param User $user The User model.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepository $repository)
    {
        $this->notifyAdmin($repository);
    }

    protected function notifyAdmin(UserRepository $repository)
    {
        $admin = $repository->findBy('email', 'info@aptoclick.com');
        if ($admin) {
            $admin->notify(new NewUserRegistered($this->user));
        }
    }
}
