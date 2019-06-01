<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
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
}
