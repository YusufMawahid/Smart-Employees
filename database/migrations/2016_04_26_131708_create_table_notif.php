<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('obyek');
            $table->integer('id_obyek');
            $table->date('tgl_pemberitahuan');
            $table->time('waktu_pemberitahuan');
            $table->integer('id_penerima');
            $table->integer('id_user');
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
        Schema::drop('notifs');
    }
}
