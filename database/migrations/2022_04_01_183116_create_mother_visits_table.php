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
            $table->string('an_reg_date', 190)->nullable();
            $table->string('financial_year')->nullable();
            $table->string('an_visit_mother_name')->nullable();
            $table->string('lmp_date', 190)->nullable();
            $table->string('edd_date', 190)->nullable();
            $table->enum('within_pregnancy_week', ['yes', 'no'])->default('yes')->nullable();
            $table->integer('district')->nullable();
            $table->unsignedBigInteger('checkup_place')->nullable();
            $table->foreign('checkup_place')->references('id')->on('mother_checkups');
            $table->string('place_name')->nullable();
            $table->enum('abortion_if_any', ['yes', 'no'])->default('yes')->nullable();
            $table->string('abortion_date', 190)->nullable();
            $table->enum('abortion_type', ['Induced', 'Spontaneous'])->default('Induced')->nullable();
            $table->integer('abortion_district')->nullable();
            $table->integer('abortion_facility')->nullable();
            $table->string('abortion_pregnancy_week')->nullable();
            $table->string('an_visit_date', 190)->nullable();
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
            $table->string('tt_date', 190)->nullable();
            $table->string('albendazole_date', 190)->nullable();
            $table->string('ifa_date', 190)->nullable();
            $table->string('ifa_tablet', 190)->nullable();
            $table->string('fa_date', 190)->nullable();
            $table->string('fa_tablet', 190)->nullable();
            $table->integer('fundal_size')->nullable();
            $table->integer('calcium_tablet')->nullable();
            $table->string('calcium_date', 190)->nullable();
            $table->integer('foetal_heart_rate')->nullable();
            $table->enum('foetal_position', ['Normal', 'Abnormal'])->default('Normal')->nullable();
            $table->enum('foetal_movement', ['Normal', 'Increase', 'Decrease', 'Absent'])->default('Normal')->nullable();
            $table->unsignedBigInteger('post_partum')->nullable();
            $table->foreign('post_partum')->references('id')->on('post_parta');
            $table->string('partum_other')->nullable();
            $table->unsignedBigInteger('high_risk')->nullable();
            $table->foreign('high_risk')->references('id')->on('high_risks');
            $table->string('high_risk_other')->nullable();
            $table->string('referral_date', 190)->nullable();
            $table->integer('referral_district')->nullable();
            $table->integer('referral_facility')->nullable();
            $table->string('referral_place')->nullable();
            $table->enum('ultrasonogram', ['Yes', 'No'])->default('Yes')->nullable();
            $table->string('ultrasonogram_date', 190)->nullable();
            $table->string('scan_edd', 190)->nullable();
            $table->string('trimester')->nullable();
            $table->integer('ultrasonogram_fundal_size')->nullable();
            $table->integer('ultrasonogram__heart_rate')->nullable();
            $table->enum('ultrasonogram_position', ['Normal', 'Abnormal'])->default('Normal')->nullable();
            $table->enum('ultrasonogram_movement', ['Normal', 'Increase', 'Decrease', 'Absent'])->default('Normal')->nullable();
            $table->string('remark')->nullable();
            $table->integer('result')->nullable();
            $table->enum('wife_hiv_screening', ['yes', 'no'])->nullable()->default('yes');
            $table->string('wife_hiv_screeing_date', 190)->nullable();
            $table->enum('wife_hiv_screeing_result', ['positive', 'negative'])->nullable()->default('negative');
            $table->enum('husband_hiv_screening', ['yes', 'no'])->nullable()->default('yes');
            $table->string('husband_hiv_screeing_date', 190)->nullable();
            $table->enum('husband_hiv_screeing_result', ['positive', 'negative'])->nullable()->default('negative');
            $table->enum('is_vdrl_rpp', ['yes', 'no'])->nullable();
            $table->string('vdrl_date', 190)->nullable();
            $table->enum('vdrl_result', ['Reactive', 'Non-reactive'])->nullable();
            $table->enum('hbsag_status', ['positive', 'negative'])->nullable()->default('positive');
            $table->string('mother_blood_grp_status', 50)->nullable();
            $table->string('blood_grp', 50)->nullable();
            $table->string('lab_other', 190)->nullable();
            $table->string('bp', 190)->nullable();
            $table->string('rbs', 190)->nullable();
            $table->string('severe', 190)->nullable();
            $table->string('other', 190)->nullable();
            $table->string('thyroid', 190)->nullable();
            $table->string('ogtt', 190)->nullable();
            $table->string('ecg', 190)->nullable();
            $table->string('echo', 190)->nullable();
            $table->string('fetus', 190)->nullable();
            $table->string('afi', 190)->nullable();
            $table->string('viability', 190)->nullable();
            $table->string('fetus_place', 190)->nullable();
            $table->string('fetal_presentation', 190)->nullable();
            $table->string('bpd', 190)->nullable();
            $table->string('placemental_position', 190)->nullable();
            $table->string('hc', 190)->nullable();
            $table->string('ac', 190)->nullable();
            $table->string('efw', 190)->nullable();
            $table->string('femur', 190)->nullable();
            $table->string('gestational_age', 190)->nullable();
            $table->string('fetal_heart_rate_bpm', 190)->nullable();
            $table->string('surgical_scar', 190)->nullable();
            $table->string('head', 190)->nullable();
            $table->string('abdominal_wall', 190)->nullable();
            $table->string('abdominal_fetal_presentation', 190)->nullable();
            $table->string('other_drug', 190)->nullable();
            $table->string('parentral_iron', 190)->nullable();
            $table->string('iron_dose', 190)->nullable();
            $table->string('blood_transfusion', 190)->nullable();
            $table->string('pregnancy_date', 190)->nullable();
            $table->string('suggested_place', 190)->nullable();
            $table->string('husband_vdrl_status', 190)->nullable();
            $table->string('husband_vdrl_date', 190)->nullable();
            $table->string('hbsag_date', 190)->nullable();
            $table->string('today', 190)->nullable();
            $table->string('crl', 190)->nullable();
            $table->string('abdomen_other', 190)->nullable();
            $table->string('referral_reason', 190)->nullable();
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
