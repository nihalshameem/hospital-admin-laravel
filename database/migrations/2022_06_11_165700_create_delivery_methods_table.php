<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('delivery_methods')->insert([
            ['name' => 'Condom'],
            ['name' => 'OC Pills'],
            ['name' => 'Iucd cu 380a(10 yrs)'],
            ['name' => 'Iucd cu 375(5 yrs)'],
            ['name' => 'Female Sterilization'],
            ['name' => 'Male Sterilization'],
            ['name' => 'None'],
            ['name' => 'hyterectomy'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_methods');
    }
}
