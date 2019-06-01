<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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

    public function show($id, User $user): UserResource
    {
        $user = $user->with('photos', 'avatar')->findOrFail($id);

        return new UserResource($user);
    }
}
