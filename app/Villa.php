<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $table = 'villa';
    protected $fillable = ['nama_villa', 'kode_villa', 'fasilitas', 'alamat', 'harga', 'jumlah_kamar', 'type', 'deskripsi', 'cover'];

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
