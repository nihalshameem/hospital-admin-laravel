<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastObstetricHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_obstetric_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->integer('total_pregnancy')->default(0);
            $table->unsignedBigInteger('last_complication_id')->nullable();
            $table->foreign('last_complication_id')->references('id')->on('pregnancy_complications');
            $table->string('last_other_complication', 100)->nullable();
            $table->unsignedBigInteger('present_complication_id')->nullable();
            $table->foreign('present_complication_id')->references('id')->on('pregnancy_complications');
            $table->string('present_other_complication', 100)->nullable();
            $table->unsignedBigInteger('outcome_id')->nullable();
            $table->foreign('outcome_id')->references('id')->on('pregnancy_outcomes');
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
        Schema::dropIfExists('past_obstetric_histories');
    }
}
