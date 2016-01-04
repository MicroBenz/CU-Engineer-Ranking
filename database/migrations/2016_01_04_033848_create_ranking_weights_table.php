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
            $table->double('gen_phy_1');
            $table->double('gen_phy_2');
            $table->double('cal_1');
            $table->double('cal_2');
            $table->double('exp_eng_1');
            $table->double('exp_eng_2');
            $table->double('gen_phy_lab_1');
            $table->double('gen_phy_lab_2');
            $table->double('gen_chem');
            $table->double('gen_chem_lab');
            $table->double('drawing');
            $table->double('com_prog');
            $table->double('material');
            $table->double('exp_eng_world');
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
