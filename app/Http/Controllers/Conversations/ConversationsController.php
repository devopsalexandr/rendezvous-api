<?php

declare(strict_types=1);

namespace App\Http\Controllers\Conversations;

use App\Http\Resources\ConversationResource;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationsController extends Controller
{
    public function index(Authenticatable $user): JsonResource
    {
        $conversations = $user->conversations()->orderBy('updated_at', 'desc')->get();

        return ConversationResource::collection($conversations);
    }
}
