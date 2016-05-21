<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'email'=>'yusuf1@yusuf.com',
        	'password' => bcrypt('admin123')
        	]);
    }

}
