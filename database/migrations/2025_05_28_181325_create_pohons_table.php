<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pohons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klaster_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('jenis_id')->constrained()->cascadeOnDelete();
            $table->integer('no_pohon');
            $table->string('azimuth');
            $table->float('jarak');
            $table->float('diameter_cm');
            $table->float('tinggi_m');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pohons');
    }
};
