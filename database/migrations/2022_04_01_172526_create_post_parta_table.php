<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostPartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_parta', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('post_parta')->insert([
            ['name' => 'Cant decide now'],
            ['name' => 'None'],
            ['name' => 'Condom'],
            ['name' => 'Male Sterilization'],
            ['name' => 'Post-Partum lucd(pp lucd)'],
            ['name' => 'Post-Partum Sterilization (pps)'],
            ['name' => 'Any Treditional Methods'],
            ['name' => 'Any Other Specify'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_parta');
    }
}
