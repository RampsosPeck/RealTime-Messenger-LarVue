<?php
use Realmessenger\User;
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

Broadcast::channel('Realmessenger.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('users.{id}', function ($user, $id) {
    return $user->id === User::findOrNew($id)->user_id;
});
/*
Broadcast::channel('users.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});*/

Broadcast::channel('messenger', function ($user) {
    return [
    	'id' => $user->id
    ];
});

