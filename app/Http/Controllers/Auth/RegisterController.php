<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;

class RegisterController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function register(RegisterFormRequest $request): UserResource
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'country'   => $request->country,
            'city'      => $request->city,
            'birthday'  => $request->birthday,
            'password' => bcrypt($request->password),
            'sex' => $request->sex
        ]);

        $token = $this->auth->attempt($request->only('email', 'password'));

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $token
            ]
        ]);
    }
}
