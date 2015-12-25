<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudiesResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('year');
            $table->string('semester');
            $table->string('subject_id');
            $table->string('grade');

            $table  ->foreign('user_id')
                    ->references('user_id')
                    ->on('users')
                    ->onDelete('cascade');

            $table  ->foreign('subject_id')
                    ->references('subject_id')
                    ->on('subjects')
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
        Schema::drop('studies_result');
    }
}
