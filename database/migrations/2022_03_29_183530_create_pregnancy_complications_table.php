<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePregnancyComplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_complications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('pregnancy_complications')->insert([
            ['name' => 'Convuision'],
            ['name' => 'Aph'],
            ['name' => 'Prognancy Induced Hypertension (PHI)'],
            ['name' => 'Repeated Abortion'],
            ['name' => 'Stillbirth'],
            ['name' => 'Congenital Anomaly'],
            ['name' => 'Caesarean - Section'],
            ['name' => 'Blood Transfusion'],
            ['name' => 'Twins'],
            ['name' => 'Obstructed Labour'],
            ['name' => 'PPH'],
            ['name' => 'Any Other (specify):'],
            ['name' => 'None'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregnancy_complications');
    }
}
