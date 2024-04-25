<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat-{chat_id}-message-user-{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('chat-{chat_id}-message-agent-{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('chat-{chat_id}-show-review-box', function ($user, $id) {
    return true;
});
Broadcast::channel('all-open-assigned-chats', function ($user, $id) {
    return true;
});
Broadcast::channel('all-open-unassigned-chats', function ($user, $id) {
    return true;
});
Broadcast::channel('my-open-chats-agent-{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('new-chat-assignment-{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('new-ticket-assignment-{id}', function ($user, $id) {
    return true;
});
Broadcast::channel('new-chat-created', function ($user, $id) {
    return true;
});

Broadcast::channel('chat-{chatId}', function ($user, int $chatId) {
    return ['id' => $user->id, 'name' => $user->name];
}, ['guards' => ['web', 'agent']]);
