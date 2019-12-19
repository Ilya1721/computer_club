<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_activity', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('activity_id');
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('activity_role_id');
          $table->string('place')->nullable();
          $table->timestamp('start_date');
          $table->timestamp('end_date');
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
        Schema::dropIfExists('user_activity');
    }
}
