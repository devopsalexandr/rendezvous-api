<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function login(LoginFormRequest $request)
    {
        if (! $token = $this->auth->attempt($request->only('email', 'password'))) {
            return response()->json([
                'errors' => [
                    'root' => 'Email or password incorrect'
                ]
            ], 401);
        }

        return (new UserResource($this->auth->user()))->additional([
            'meta' => [
                'token' => $token
            ]
        ]);

    }
}
