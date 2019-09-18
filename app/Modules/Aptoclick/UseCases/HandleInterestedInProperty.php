<?php

namespace Raffles\Modules\Aptoclick\UseCases;

use Raffles\Modules\Aptoclick\Mail\InterestedInProperty as EmailUser;
use Raffles\Modules\Aptoclick\Mail\Admin\InterestedInProperty as EmailAdmin;
use Raffles\Modules\Aptoclick\Models\Property;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class HandleInterestedInProperty
{
    use Dispatchable;

    /**
     * The Property model.
     *
     * @var Property $property
     */
    protected $property;

    /**
     * The form data.
     *
     * @var array $data
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param Property $property The Property model.
     * @param array    $data     The form data.
     *
     * @return void
     */
    public function __construct(Property $property, $data)
    {
        $this->property = $property;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->emailAdmin();
        $this->emailUser(); 
    }

    protected function emailAdmin()
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))
            ->queue(new EmailAdmin($this->property, $this->data));
    }

    protected function emailUser()
    {
        Mail::to($this->data['email'])
            ->queue(new EmailUser($this->property, $this->data));
    }
}
