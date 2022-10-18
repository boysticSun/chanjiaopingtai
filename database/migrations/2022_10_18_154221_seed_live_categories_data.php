<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $categories = [
            [
                'name'        => '在线授课',
                'description' => '在线授课',
            ],
            [
                'name'        => '经验学习',
                'description' => '经验学习',
            ],
            [
                'name'        => '案例分享',
                'description' => '案例分享',
            ],
            [
                'name'        => '公示政策',
                'description' => '公示政策讲解',
            ],
        ];

        DB::table('live_categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::table('live_categories')->truncate();
    }
};
