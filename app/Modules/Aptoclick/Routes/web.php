<?php

use Raffles\Modules\Aptoclick\Models\{ Property, User };
use Raffles\Modules\Aptoclick\Mail\PropertyCreated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get(
    '/mailable/property-created', function () {
        $user = User::first();
        $property = Property::first();

        return new PropertyPublished($property, $user);
    }
);
