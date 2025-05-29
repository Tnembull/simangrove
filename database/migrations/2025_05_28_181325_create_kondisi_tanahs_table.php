<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kondisi_tanahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klaster_id')->constrained()->cascadeOnDelete();
            $table->string('titik_sampel');
            $table->string('penutupan_tanah');
            $table->string('tekstur_tanah');
            $table->integer('ketebalan_cm');
            $table->string('lintang');
            $table->string('bujur');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kondisi_tanahs');
    }
};
