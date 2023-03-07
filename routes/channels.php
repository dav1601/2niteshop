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

Broadcast::channel('user.{id}', function ($user, $id) {
    return $user;
});
Broadcast::channel('common', function () {
    return true;
});
Broadcast::channel('product.{id}', function ($id) {
    return $id;
});
Broadcast::channel('admin.order.{id}', function ($id) {
    return $id;
});
Broadcast::channel('admin.order', function ($id) {
    return $id;
});
