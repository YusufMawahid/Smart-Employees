<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbsen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('absen_id');
            $table->string('follet');
            $table->string('surat');
            $table->string('bulan');
            $table->enum('acc',[0,1,2]);
            $table->date('tgl_ada');
            $table->time('intime');
            $table->time('outtime');
            $table->integer('id_emp');
            $table->enum('visible',[0,1]);
            $table->enum('status',[1,2,3,4]);
            $table->rememberToken();
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
        Schema::drop('absens');
    }
}
