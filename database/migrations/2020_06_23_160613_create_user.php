<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->Increments('id');
            $table->char('email');
            $table->string('password');
            $table->string('name');
            $table->tinyInteger('sex')->nullable();
            $table->date('birthdate')->nullable();
            $table->char('phone',10);
            $table->string('address')->nullable();
            $table->tinyInteger('role');
            $table->tinyInteger('status');
            $table->string('remember_token')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
