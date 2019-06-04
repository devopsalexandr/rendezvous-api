<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Conversation\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the conversations.
     *
     * @param User $user
     * @param Conversation $conversation
     * @return bool
     */
    public function view(User $user, Conversation $conversation): bool
    {
        $userConversations = $user->conversations()->get();

        return $userConversations->contains($conversation);
    }
}
