<?php

namespace Raffles\Modules\Aptoclick\Http\Controllers\Auth;

use Raffles\Http\Controllers\Auth\RegisterController as Controller;
use Raffles\Modules\Aptoclick\Models\User;
use Raffles\Modules\Aptoclick\UseCases\HandleUserRegistration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/properties/create';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
            'curp' => 'required|unique:users,curp',
            'email' => 'required|string|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'rfc' => 'required|unique:users,rfc',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create(
            [
            'curp' => $data['curp'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'password' => $data['password'],
            'rfc' => $data['rfc'],
            ]
        );

        $user->address()->create([]);
        $user->contact()->create([]);

        return $user;
    }

    /**
     * The user has been registered.
     *
     * @param Request $request
     * @param mixed   $user
     *
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $this->dispatchNow(new HandleUserRegistration($user));
    }
}
