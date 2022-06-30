<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePregnancyOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancy_outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('pregnancy_outcomes')->insert([
            ['name' => 'Abortion-Spon'],
            ['name' => 'MTP'],
            ['name' => 'SB'],
            ['name' => 'LB'],
            ['name' => 'Live & Still Birth'],
            ['name' => 'IUD'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregnancy_outcomes');
    }
}
