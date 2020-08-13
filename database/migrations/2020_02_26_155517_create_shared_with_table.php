<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedWithTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_with', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('password_id');
            $table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('password_id')->references('id')->on('passwords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_with');
    }
}
