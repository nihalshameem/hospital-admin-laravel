<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHighRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_risks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('high_risks')->insert([
            ['name' => 'High bp (systolic >=140 and or diastolic >=90 mmhg)'],
            ['name' => 'Convulsions'],
            ['name' => 'Vaginal bleeding'],
            ['name' => 'Foul Smelling discharge'],
            ['name' => 'Severe Anaemia (hb level <7gm%)'],
            ['name' => 'Diabetes'],
            ['name' => 'Twins'],
            ['name' => 'Any Other (Specify)'],
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
        Schema::dropIfExists('high_risks');
    }
}
