<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('hospital_types')->insert([
            ['name' => 'HSC'],
            ['name' => 'UHP'],
            ['name' => 'PHC'],
            ['name' => 'GH'],
            ['name' => 'T-HOSP'],
            ['name' => 'EMPANELLED HOSPITALS'],
            ['name' => 'SCAN CENTER'],
            ['name' => 'PRIVATE HOSPITAL WITH MORE DELIVERIES'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_types');
    }
}
