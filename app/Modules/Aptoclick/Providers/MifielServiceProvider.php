<?php

namespace Raffles\Modules\Aptoclick\Providers;

use Illuminate\Support\ServiceProvider;
use Mifiel\ApiClient as Mifiel;

class MifielServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Mifiel::setTokens(env('MIFIEL_APP_ID'), env('MIFIEL_APP_SECRET'));

        // if you want to use our sandbox environment use:
        Mifiel::url('https://sandbox.mifiel.com/api/v1/');
    }
}
