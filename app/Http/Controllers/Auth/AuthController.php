<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
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

    public function logout(): JsonResponse
    {
        $this->auth->invalidate($this->auth->getToken());

        return new JsonResponse(null, 200);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $token = $this->auth->refresh();

        return new JsonResponse([
            'data' => $this->auth->user(),
            'meta' => [
                'token' => $token
            ]
        ], 200);
    }
}
