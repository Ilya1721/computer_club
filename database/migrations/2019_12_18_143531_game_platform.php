<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GamePlatform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('game_platform', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('game_id');
          $table->unsignedBigInteger('platform_id');
          $table->timestamp('updated_at')->useCurrent();
          $table->timestamp('created_at')->useCurrent();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_platform');
    }
}
