<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivestocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->string('name');
            $table->string('image');
            $table->string('type');
            $table->integer('breed');
            $table->string('stage');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->float('weight');
            $table->integer('source');
            $table->string('mother_tag');
            $table->string('father_tag');
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
        Schema::dropIfExists('livestocks');
    }
}
