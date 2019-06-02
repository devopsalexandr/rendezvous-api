<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\AuthUserVisitProfile;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(?Authenticatable $user)
    {
        $this->user = $user;
    }

    public function index(): UserResource
    {
        return new UserResource($this->user);
    }

    public function show(User $user): UserResource
    {
        broadcast(new AuthUserVisitProfile($user, $this->user));

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request): UserResource
    {
        $this->user->update($request->all());

        return new UserResource($this->user);
    }
}
