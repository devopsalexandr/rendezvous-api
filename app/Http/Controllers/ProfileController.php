<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

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
        return new UserResource($user);
    }

    public function update(Request $request)
    {
        $this->user->update($request->all());

        return new UserResource($this->user);
    }
}
