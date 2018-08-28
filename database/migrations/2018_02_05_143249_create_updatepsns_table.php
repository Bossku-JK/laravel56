<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatepsnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updatepsns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number_pks');
            $table->string('number_kss');
            $table->string('prefix');
            $table->string('name');
            $table->string('lastname');
            $table->string('monkname');
            $table->date('birthday');
            $table->date('birth_monkday');
            $table->string('school_name');
            $table->string('wat_name');
            $table->string('etc');
            $table->string('contact');
            $table->string('contact2');
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
        Schema::dropIfExists('updatepsns');
    }
}
