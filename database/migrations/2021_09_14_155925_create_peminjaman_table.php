<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('anggota_id')->unsigned();
            $table->foreign('anggota_id')->references('id')->on('siswa')->onUpdate('cascade')->onDelete(NULL);
            $table->bigInteger('buku_id')->unsigned();
            $table->foreign('buku_id')->references('id')->on('buku')->onUpdate('cascade')->onDelete(NULL);
            $table->integer('jumlah_buku_dipinjam');
            $table->date('tanggal_dipinjam');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
