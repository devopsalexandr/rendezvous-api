<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    protected $user;

    public function __construct(?Authenticatable $user)
    {
        $this->user = $user;
    }
}
