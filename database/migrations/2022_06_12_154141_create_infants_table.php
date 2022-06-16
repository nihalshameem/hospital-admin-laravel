<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('infant_number')->nullable();
            $table->string('rch_number')->nullable();
            $table->string('birth_term')->nullable();
            $table->string('infant_sex')->nullable();
            $table->string('baby_cry')->nullable();
            $table->unsignedBigInteger('birth_defect_id')->nullable();
            $table->foreign('birth_defect_id')->references('id')->on('birth_defects');
            $table->string('birth_weight')->nullable();
            $table->string('feeding_status')->nullable();
            $table->string('live_birth_order')->nullable();
            $table->string('opv_o_dose')->nullable();
            $table->string('bcg_dose')->nullable();
            $table->string('hep_o_dose')->nullable();
            $table->string('vitk_dose')->nullable();
            $table->string('crs_status')->nullable();
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
        Schema::dropIfExists('infants');
    }
}
