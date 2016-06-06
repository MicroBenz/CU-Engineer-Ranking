<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonMajorRankingScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_major_ranking_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->double('ce_score');
            $table->double('ee_score');
            $table->double('me_score');
            $table->double('auto_score');
            $table->double('be_score');
            $table->double('ie_score');
            $table->double('che_score');
            $table->double('metal_score');
            $table->double('env_score');
            $table->double('pe_score');
            $table->double('cp_score');
            $table->double('geo_score');
            $table->double('survey_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('non_major_ranking_scores');
    }
}
