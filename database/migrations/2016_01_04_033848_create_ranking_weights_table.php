<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('major');
            $table->double('ENG DRAWING');
            $table->double('ENG MATERIALS');
            $table->double('COMP PROG');
            $table->double('EXPL ENG WORLD');
            $table->double('CALCULUS I');
            $table->double('CALCULUS II');
            $table->double('GEN PHYS I');
            $table->double('GEN PHYS II');
            $table->double('GEN CHEM');
            $table->double('EXP ENG I');
            $table->double('EXP ENG II');
            $table->double('GEN CHEM LAB');
            $table->double('GEN PHYS LAB I');
            $table->double('GEN PHYS LAB II');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ranking_weights');
    }
}
