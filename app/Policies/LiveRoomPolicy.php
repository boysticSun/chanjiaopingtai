<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LiveRoom;

class LiveRoomPolicy extends Policy
{
    public function update(User $user, LiveRoom $live_room)
    {
        // return $live_room->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, LiveRoom $live_room)
    {
        return true;
    }
}
