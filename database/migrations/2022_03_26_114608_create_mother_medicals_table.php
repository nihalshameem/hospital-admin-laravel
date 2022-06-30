<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother_medicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('pw_rch_reg_number', 150)->nullable();
            $table->string('an_reg_date', 190)->nullable();
            $table->string('financial_year', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('lmp_date', 190)->nullable();
            $table->enum('within_pregnancy_week', ['yes', 'no'])->nullable()->default('yes');
            $table->string('edd_date', 190)->nullable();
            $table->string('mother_blood_grp_status', 50)->nullable();
            $table->string('blood_grp', 50)->nullable();
            $table->unsignedBigInteger('past_illness_id')->nullable();
            $table->foreign('past_illness_id')->references('id')->on('past_illnesses');
            $table->string('other_past_illness', 100)->nullable();
            $table->enum('is_vdrl_rpp', ['yes', 'no'])->nullable();
            $table->string('vdrl_date', 190)->nullable();
            $table->enum('vdrl_result', ['Reactive', 'Non-reactive'])->nullable();
            $table->enum('eligible_for_mrmbs', ['yes', 'no'])->nullable()->default('no');
            $table->enum('hbsag_done', ['yes', 'no'])->nullable()->default('yes');
            $table->enum('hbsag_status', ['positive', 'negative'])->nullable()->default('positive');
            $table->enum('wife_hiv_screening', ['yes', 'no'])->nullable()->default('yes');
            $table->string('wife_hiv_screeing_date', 190)->nullable();
            $table->enum('wife_hiv_screeing_result', ['positive', 'negative'])->nullable()->default('negative');
            $table->enum('husband_hiv_screening', ['yes', 'no'])->nullable()->default('yes');
            $table->string('husband_hiv_screeing_date', 190)->nullable();
            $table->enum('husband_hiv_screeing_result', ['positive', 'negative'])->nullable()->default('negative');
            $table->enum('surgery_history', 190)->nullable();
            $table->enum('blood_transfusion', 190)->nullable();
            $table->enum('prev_gravida', 190)->nullable();
            $table->enum('prev_birth_year', 190)->nullable();
            $table->enum('prev_baby_sex', 190)->nullable();
            $table->enum('prev_pregnancy_duration', 190)->nullable();
            $table->enum('prev_delivery_place', 190)->nullable();
            $table->enum('prev_district', 190)->nullable();
            $table->enum('prev_outcome', 190)->nullable();
            $table->enum('prev_weight', 190)->nullable();
            $table->enum('prev_birth_state', 190)->nullable();
            $table->enum('prev_complication', 190)->nullable();
            $table->enum('prev_other_complication', 190)->nullable();
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
        Schema::dropIfExists('mother_medicals');
    }
}
