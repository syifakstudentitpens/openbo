<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_villa');
            $table->string('kode_villa', 25)->nullable();
            $table->string('alamat')->nullable();
            $table->string('fasilitas')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('jumlah_kamar');
            $table->text('deskripsi')->nullable();
            $table->enum('type', ['seri1', 'seri2', 'seri3'])->nullable();
            $table->string('cover')->nullable();
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
        Schema::dropIfExists('buku');
    }
}
