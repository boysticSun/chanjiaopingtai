<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	public function up()
	{
		Schema::create('live_rooms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->integer('live_category_id')->unsigned()->index();
            $table->text('excerpt')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('live_rooms');
	}
};
