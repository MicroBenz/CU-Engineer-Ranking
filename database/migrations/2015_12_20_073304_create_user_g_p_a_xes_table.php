<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGPAXesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_gpax', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('year');
            $table->string('semester');
            $table->string('gpa');
            $table->string('gpax');

            $table  ->foreign('user_id')
                    ->references('user_id')
                    ->on('users')
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
        Schema::drop('user_gpax');
    }
}
