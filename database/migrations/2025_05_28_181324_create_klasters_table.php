<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('klasters', function (Blueprint $table) {
            $table->id();
            $table->string('pengukuran_ke');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('bentuk_lahan');
            $table->string('titik_koordinat');
            $table->integer('altitude');
            $table->string('tahun_tanam');
            $table->integer('umur');
            $table->float('luas_ha');
            $table->string('nama_petani');
            $table->string('jarak_tanam')->nullable();
            $table->string('pola_tanam');
            $table->string('jenis_tanaman');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klasters');
    }
};
