<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('titik_ikats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klaster_id')->constrained()->cascadeOnDelete();
            $table->string('nama_titik_ikat');
            $table->string('azimuth');
            $table->float('jarak');
            $table->string('lintang');
            $table->string('bujur');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('titik_ikats');
    }
};
