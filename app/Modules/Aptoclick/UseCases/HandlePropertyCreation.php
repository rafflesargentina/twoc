<?php

namespace Raffles\Modules\Aptoclick\UseCases;

use Raffles\Modules\Aptoclick\Mail\PropertyPublished as UserEmail;
use Raffles\Modules\Aptoclick\Mail\Admin\PropertyPublished as AdminEmail;
use Raffles\Modules\Aptoclick\Models\{ Property, User };

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class HandlePropertyCreation
{
    use Dispatchable;

    /**
     * The Property and User models.
     *
     * @var Property $property
     * @var User     $user
     */
    protected $property, $user;

    /**
     * Create a new job instance.
     *
     * @param Property $property The Property model.
     * @param User     $user     The User model.
     *
     * @return void
     */
    public function __construct(Property $property, User $user)
    {
        $this->property = $property;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->emailUser();
        $this->emailAdmin();
    }

    protected function emailUser()
    {
        Mail::to($this->user)
            ->queue(new UserEmail($this->property, $this->user));
    }

    protected function emailAdmin()
    {
        $this->property->loadMissing('contact', 'property_condition', 'property_type');

        Mail::to(env('MAIL_FROM_ADDRESS'))
            ->queue(new AdminEmail($this->property, $this->user));        
    }
}
