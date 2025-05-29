<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mortalitas_regenerasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klaster_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('jenis_id')->constrained()->cascadeOnDelete();
            $table->integer('no');
            $table->integer('jumlah_mati_ka');
            $table->integer('jumlah_lain_ll');
            $table->integer('jumlah_regenerasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mortalitas_regenerasis');
    }
};
