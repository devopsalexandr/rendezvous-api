<?php

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('conversation.{id}', function ($user, $id) {

    $conversations = $user->conversations()->get();

    return $conversations->contains('id', $id);
});

Broadcast::channel('conversations.{userId}', function ($user, $userId) {

    return (int) $user->id === (int) $userId;
});