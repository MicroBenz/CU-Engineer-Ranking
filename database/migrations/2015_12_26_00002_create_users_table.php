<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('surname');
            $table->string('major');
            $table->string('adviser_code');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
            $table  ->foreign('adviser_code')
                ->references('code')
                ->on('advisers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
