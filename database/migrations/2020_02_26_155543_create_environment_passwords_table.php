<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentPasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_passwords', function (Blueprint $table) {
            $table->unsignedBigInteger('environment_id');
			$table->unsignedBigInteger('password_id');
            $table->timestamps();
			
			$table->foreign('environment_id')->references('id')->on('environments');
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
        Schema::dropIfExists('environment_passwords');
    }
}
