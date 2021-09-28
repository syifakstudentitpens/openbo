<?php

use Illuminate\Database\Seeder;

class VillasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Villa::insert([
            [
              'id'  			=> 1,
              'nama_villa'  			=> 'Villa Songgoriti Gang Macan',
              'kode_villa'			=> '123456789',
              'alamat' 		=> 'Gang Macan Songgoriti Batu Malang',
              'fasilitas'		=> 'AC, TV, Kasur, Kamar Mandi',
              'harga'	=> 300000,
              'jumlah_kamar'		=> 5,
              'deskripsi'		=> 'Villa dengan fasilitas lengkap',
              'type'			=> 'seri1',
              'cover'			=> 'buku_java.jpg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'nama_villa'  			=> 'Villa Puncak Tidar Atas',
              'kode_villa'			=> '987654321',
              'alamat' 		=> 'Tidar atas lowokwaru Malang',
              'fasilitas'		=> 'AC, TV, Kasur, Kamar Mandi, Parkir Luas',
              'harga'	=> 1000000,
              'jumlah_kamar'		=> 3,
              'deskripsi'		=> 'Villa dengan fasilitas lengkap dan nyaman untuk liburan',
              'type'			=> 'seri1',
              'cover'			=> 'buku_java.jpg',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
