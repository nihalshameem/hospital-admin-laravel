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
            $table->bigInteger('hsc_id');
            $table->string('rch_id',200);
            $table->string('anc_number', 100)->nullable();
            $table->date('ec_reg_date')->nullable();
            $table->string('financial_year', 100)->nullable();
            $table->string('an_mother', 200)->nullable();
            $table->string('husband_name', 200)->nullable();
            $table->longText('address')->nullable();
            $table->string('whom_mobile')->nullable();
            $table->string('mobile')->nullable();
            $table->string('husband_mobile')->nullable();
            $table->integer('living_children')->default(0);
            $table->enum('cast', ['ST', 'SC', 'Others']);
            $table->enum('religion', ['Christian', 'Muslim', 'Hindu', 'Others'])->nullable();
            $table->date('dob')->nullable();
            $table->integer('gravida')->default(0);
            $table->integer('para')->default(0);
            $table->float('pw_height', 8, 2)->nullable();
            $table->float('mother_weight', 8, 2)->nullable();
            $table->float('bp_systolic', 8, 2)->nullable();
            $table->float('bp_diastolic', 8, 2)->nullable();
            $table->string('bpl_apl')->nullable();
            $table->date('last_visit_date_ec_tracking')->nullable();
            $table->date('an_reg_date')->nullable();
            $table->integer('age')->nullable();
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
