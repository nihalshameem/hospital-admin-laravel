<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhoConductedDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('who_conducted_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('who_conducted_deliveries')->insert([
            ['name' => 'ANM'],
            ['name' => 'LHV'],
            ['name' => 'Doctor'],
            ['name' => 'Staff Nurse'],
            ['name' => 'Relative'],
            ['name' => 'Other'],
            ['name' => 'SBA'],
            ['name' => 'NON SBA'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('who_conducted_deliveries');
    }
}
