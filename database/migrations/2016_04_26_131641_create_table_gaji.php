<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGaji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gaji_id');
            $table->integer('perjam');
            $table->integer('omoney');
            $table->integer('tmoney');
            $table->string('bulan');
            $table->date('tgl_gaji');
            $table->time('waktu_gaji');
            $table->integer('id_emp');
            $table->softDeletes();
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
        Schema::drop('gajis');
    }
}
