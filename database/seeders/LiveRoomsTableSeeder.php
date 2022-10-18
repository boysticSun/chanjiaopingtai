<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LiveRoom;

class LiveRoomsTableSeeder extends Seeder
{
    public function run()
    {
        LiveRoom::factory()->count(10)->create();
    }
}

