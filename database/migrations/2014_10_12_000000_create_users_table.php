<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roles');
            $table->string('nama');
            $table->integer('job_id');
            $table->string('gaji');
            $table->string('umur');
            $table->string('divisi');
            $table->string('code_div');
            $table->string('tgl_lahir');
            $table->enum('jenis_kelamin',['Man','Woman']);
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('norek');
            $table->string('photo');
            $table->string('status');
            $table->string('uang_makan');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::drop('users');
    }
}
