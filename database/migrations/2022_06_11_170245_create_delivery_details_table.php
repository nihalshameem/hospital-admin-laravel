<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->string('vhn_name', 190)->nullable();
            $table->string('mother_number', 190)->nullable();
            $table->string('reg_date', 190)->nullable();
            $table->string('last_anc_date', 190)->nullable();
            $table->string('edd_date', 190)->nullable();
            $table->string('mother_name', 190)->nullable();
            $table->string('delivery_date', 190)->nullable();
            $table->string('delivery_time_h', 190)->nullable();
            $table->string('delivery_time_m', 190)->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('hospital_type_id')->nullable();
            $table->foreign('hospital_type_id')->references('id')->on('hospital_types');
            $table->string('hospital_name', 190)->nullable();
            $table->unsignedBigInteger('who_conducted_delivery_id')->nullable();
            $table->foreign('who_conducted_delivery_id')->references('id')->on('who_conducted_deliveries');
            $table->string('delivery_type', 190)->nullable();
            $table->string('complication', 190)->nullable();
            $table->unsignedBigInteger('delivery_outcome_id')->nullable();
            $table->foreign('delivery_outcome_id')->references('id')->on('delivery_outcomes');
            $table->string('born_count', 190)->nullable();
            $table->string('live_birth', 190)->nullable();
            $table->string('still_birth', 190)->nullable();
            $table->unsignedBigInteger('method_id')->nullable();
            $table->foreign('method_id')->references('id')->on('delivery_methods');
            $table->string('method_date', 190)->nullable();
            $table->string('discharge_date', 190)->nullable();
            $table->string('discharge_time_h', 190)->nullable();
            $table->string('discharge_time_m', 190)->nullable();
            $table->string('jsy_payment_status', 190)->nullable();
            $table->string('jsy_payment_date', 190)->nullable();
            $table->string('jsy_payment_amount', 190)->nullable();
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
        Schema::dropIfExists('delivery_details');
    }
}
