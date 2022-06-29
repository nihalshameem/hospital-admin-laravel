<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hsc_id')->nullable();
            $table->enum('visit_type', ['resident', 'visitor'])->default('resident')->nullable();
            $table->string('rch_id', 200)->nullable();
            $table->string('anc_number', 100)->nullable();
            $table->string('ec_reg_date', 190)->nullable();
            $table->string('financial_year', 100)->nullable();
            $table->string('an_mother', 200)->nullable();
            $table->string('husband_name', 200)->nullable();
            $table->longText('address')->nullable();
            $table->string('whom_mobile')->nullable();
            $table->string('mobile')->nullable();
            $table->string('husband_mobile')->nullable();
            $table->integer('living_children')->default(0)->nullable();
            $table->enum('cast', ['ST', 'SC', 'Others'])->nullable();
            $table->enum('religion', ['Christian', 'Muslim', 'Hindu', 'Others'])->nullable();
            $table->string('dob', 190)->nullable();
            $table->integer('gravida')->default(0)->nullable();
            $table->integer('para')->default(0)->nullable();
            $table->float('pw_height', 8, 2)->nullable();
            $table->float('mother_weight', 8, 2)->nullable();
            $table->float('bp_systolic', 8, 2)->nullable();
            $table->float('bp_diastolic', 8, 2)->nullable();
            $table->string('bpl_apl')->nullable();
            $table->string('last_visit_date_ec_tracking', 190)->nullable();
            $table->string('an_reg_date', 190)->nullable();
            $table->integer('age')->nullable();
            $table->string('lmp_date', 190)->nullable();
            $table->string('corrected_lmp_date', 190)->nullable();
            $table->string('edd_date', 190)->nullable();
            $table->string('corrected_edd_date', 190)->nullable();
            $table->string('abortion', 190)->nullable();
            $table->string('neonatal', 190)->nullable();
            $table->string('within_pregnancy_week', 190)->nullable();
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
        Schema::dropIfExists('patients');
    }
}
