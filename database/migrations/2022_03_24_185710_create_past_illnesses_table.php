<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastIllnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_illnesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('past_illnesses')->insert([
            [
                'name' => 'TB',
            ], [
                'name' => 'Diabetes',
            ], [
                'name' => 'Hypertension',
            ], [
                'name' => 'Heart Disease',
            ], [
                'name' => 'Epileptic (Convuision)',
            ], [
                'name' => 'STI/RTI',
            ], [
                'name' => 'HIV+VE',
            ], [
                'name' => 'Hepatitis B',
            ], [
                'name' => 'Asthma',
            ], [
                'name' => 'Gestational Diabetes Mellitus(GDM)',
            ], [
                'name' => 'Hypothyroidism',
            ], [
                'name' => 'Any Other(Specify)',
            ],
        ]

        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('past_illnesses');
    }
}
