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
            'nama' => 'Yusuf Mawahid',
        	'email'=>'admin@gmail.com',
        	'password' => bcrypt('admin123'),
            'roles'  => 'admin',
            'job_id' => '1',
            'gaji' => 'Rp.100.000.000',
            'divisi' => '1',
            'uang_makan' => '100000',
            'code_div' => '9384',
            'umur' => '17 tahun',
            'tgl_lahir' => '05/19/1999',
            'jenis_kelamin' => 'Man',
            'alamat' => 'Jalan Sumatra',
            'no_hp' => '(081)219-947-273',
            'norek' => '83925-91726-91823',
            'photo' => '20160517135918573b23b65fc8e.jpg',
            'status' => 'Belum Menikah'
        	]);

        DB::table('jobs')->insert([
            'name' => 'Direktur',
            'pekerjaan' => '100000000'
            ]);
        DB::table('divisis')->insert([
            'nama' => 'Divisi Pemrograman',
            'code' => '9815'
            ]);
    }

}
