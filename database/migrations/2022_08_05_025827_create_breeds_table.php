<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->integer('animal_type');
            $table->string('name');
            $table->string('ears');
            $table->string('horns');
            $table->float('heights');
            $table->string('temperament');
            $table->string('bearded');
            $table->string('fertility_rate');
            $table->string('likely_offspring_number');
            $table->float('kid_likely_weight');
            $table->text('comments');
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
        Schema::dropIfExists('breeds');
    }
}
