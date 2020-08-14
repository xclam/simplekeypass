<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passwords', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->string('login');
            $table->longText('password');
			$table->string('url')->nullable();
			$table->text('notes')->nullable();
			
			$table->unsignedBigInteger('create_by')->nullable();
			$table->unsignedBigInteger('update_by')->nullable();
			
            $table->timestamps();
			
			$table->foreign('create_by')->references('id')->on('users');
			$table->foreign('update_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passwords');
    }
}
