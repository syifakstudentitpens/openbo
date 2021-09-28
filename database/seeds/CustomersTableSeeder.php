<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Customer::insert([
            [
              'id'  			=> 3,
              'user_id'  		=> 2,
              'nik'				=> 2041723010,
              'nama' 			=> 'Aji Ardiansyah',
              'tempat_lahir'	=> 'Bojonegoro',
              'tgl_lahir'		=> '1999-08-17',
              'jk'				=> 'L',
              'pekerjaan'			=> 'PNS',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 4,
              'user_id'  		=> 2,
              'nik'				=> 2041723001,
              'nama' 			=> 'farid bagus',
              'tempat_lahir'	=> 'Bojonegoro',
              'tgl_lahir'		=> '1999-09-01',
              'jk'				=> 'L',
              'pekerjaan'			=> 'PNS',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
