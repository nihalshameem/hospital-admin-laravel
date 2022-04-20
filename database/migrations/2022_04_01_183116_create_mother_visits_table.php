<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mother_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->enum('visit_type', ['resident', 'visitor'])->default('resident')->nullable();
            $table->string('rch_number')->nullable();
            $table->date('an_reg_date')->nullable();
            $table->string('financial_year')->nullable();
            $table->string('an_visit_mother_name')->nullable();
            $table->date('lmp_date')->nullable();
            $table->date('edd_date')->nullable();
            $table->enum('within_pregnancy_week', ['yes', 'no'])->default('yes')->nullable();
            $table->integer('district')->nullable();
            $table->unsignedBigInteger('checkup_place')->nullable();
            $table->foreign('checkup_place')->references('id')->on('mother_checkups');
            $table->string('place_name')->nullable();
            $table->enum('abortion_if_any', ['yes', 'no'])->default('yes')->nullable();
            $table->date('abortion_date')->nullable();
            $table->enum('abortion_type', ['Induced', 'Spontaneous'])->default('Induced')->nullable();
            $table->integer('abortion_district')->nullable();
            $table->integer('abortion_facility')->nullable();
            $table->string('abortion_pregnancy_week')->nullable();
            $table->date('an_visit_date')->nullable();
            $table->string('anc_period')->nullable();
            $table->string('pregnancy_week')->nullable();
            $table->integer('an_mother_weight')->nullable();
            $table->integer('bp_systolic')->nullable();
            $table->integer('bp_diastolic')->nullable();
            $table->integer('hb')->nullable();
            $table->enum('urine_test', ['Done', 'Not Done'])->default('Done')->nullable();
            $table->enum('urine_sugar', ['Absent', 'Present'])->default('Absent')->nullable();
            $table->integer('urine_albumin')->nullable();
            $table->enum('blood_sugar_test', ['Done', 'Not Done'])->default('Done')->nullable();
            $table->integer('fasting')->nullable();
            $table->integer('post_prandial')->nullable();
            $table->enum('gct', ['Done', 'Not Done'])->default('Done')->nullable();
            $table->integer('gct_value')->nullable();
            $table->enum('tt_dose', ['TT1', 'TT2', 'TT BOOSTER'])->default('TT1')->nullable();
            $table->date('tt_date')->nullable();
            $table->date('albendazole_date')->nullable();
            $table->date('ifa_date')->nullable();
            $table->integer('fundal_size')->nullable();
            $table->integer('calcium_tablet')->nullable();
            $table->date('calcium_date')->nullable();
            $table->integer('foetal_heart_rate')->nullable();
            $table->enum('foetal_position', ['Normal', 'Abnormal'])->default('Normal')->nullable();
            $table->enum('foetal_movement', ['Normal', 'Increase', 'Decrease', 'Absent'])->default('Normal')->nullable();
            $table->unsignedBigInteger('post_partum')->nullable();
            $table->foreign('post_partum')->references('id')->on('post_parta');
            $table->string('partum_other')->nullable();
            $table->unsignedBigInteger('high_risk')->nullable();
            $table->foreign('high_risk')->references('id')->on('high_risks');
            $table->string('high_risk_other')->nullable();
            $table->date('referral_date')->nullable();
            $table->integer('referral_district')->nullable();
            $table->integer('referral_facility')->nullable();
            $table->string('referral_place')->nullable();
            $table->enum('ultrasonogram', ['Yes', 'No'])->default('Yes')->nullable();
            $table->date('ultrasonogram_date')->nullable();
            $table->date('scan_edd')->nullable();
            $table->string('trimester')->nullable();
            $table->integer('ultrasonogram_fundal_size')->nullable();
            $table->integer('ultrasonogram__heart_rate')->nullable();
            $table->enum('ultrasonogram_position', ['Normal', 'Abnormal'])->default('Normal')->nullable();
            $table->enum('ultrasonogram_movement', ['Normal', 'Increase', 'Decrease', 'Absent'])->default('Normal')->nullable();
            $table->string('remark')->nullable();
            $table->integer('result')->nullable();
            $table->enum('wife_hiv_screening', ['yes', 'no'])->nullable()->default('yes');
            $table->date('wife_hiv_screeing_date')->nullable();
            $table->enum('wife_hiv_screeing_result', ['positive', 'negative'])->nullable()->default('negative');
            $table->enum('husband_hiv_screening', ['yes', 'no'])->nullable()->default('yes');
            $table->date('husband_hiv_screeing_date')->nullable();
            $table->enum('husband_hiv_screeing_result', ['positive', 'negative'])->nullable()->default('negative');
            $table->enum('is_vdrl_rpp', ['yes', 'no'])->nullable();
            $table->date('vdrl_date')->nullable();
            $table->enum('vdrl_result', ['Reactive', 'Non-reactive'])->nullable();
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
        Schema::dropIfExists('mother_visits');
    }
}
