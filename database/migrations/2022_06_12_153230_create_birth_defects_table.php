<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthDefectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_defects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('birth_defects')->insert([
            ['name' => 'Cleft lip/Cleft Palate'],
            ['name' => 'Club foot'],
            ['name' => 'Downs Syndrome'],
            ['name' => 'Hydrocephalus'],
            ['name' => 'Imperforate Anus'],
            ['name' => 'Neural tube defect(Spina bifida)'],
            ['name' => 'Nill'],
            ['name' => 'Any Other'],
            ['name' => 'Not Available'],
            ['name' => 'Neural tibe defect'],
            ['name' => 'Cleft lip & Palate'],
            ['name' => 'Talips (club foot)'],
            ['name' => 'Developmental dysplasia of hip'],
            ['name' => 'Congenital cataract'],
            ['name' => 'Congenital Heart Disease'],
            ['name' => 'Retinopathy of Prematurity'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('birth_defects');
    }
}
