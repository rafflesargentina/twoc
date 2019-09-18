<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Auth\RegisterController@register');

Route::apiResource('amenities', 'AmenityController');
Route::apiResource('facilities', 'FacilityController');
Route::apiResource('property-conditions', 'PropertyConditionController');
Route::apiResource('property-types', 'PropertyTypeController');
Route::apiResource('users', 'UserController');

// Properties
Route::get('my-properties', Properties\MyPropertiesController::class);
Route::apiResource('properties', Properties\PropertyController::class);

Route::get('/properties/{id}/contract', 'ContractController');
Route::post('/interested/{id}', 'InterestedController');
Route::post('/valorize', 'ValorizeController');
Route::post('/register', 'Auth\RegisterController@register');

Route::middleware('auth:api')->group(
    function () {
        Route::get('account', 'AccountController');
        Route::put('account', 'UpdateAccountController');
    }
);
