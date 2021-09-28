<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['kode_transaksi', 'customer_id', 'villa_id', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function villa()
    {
    	return $this->belongsTo(Villa::class);
    }
}
