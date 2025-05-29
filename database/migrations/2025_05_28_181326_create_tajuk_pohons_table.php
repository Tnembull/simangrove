<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tajuk_pohons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klaster_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pohon_id')->constrained()->cascadeOnDelete();
            $table->string('LCR')->nullable();
            $table->string('Cden')->nullable();
            $table->string('FT')->nullable();
            $table->string('CDB')->nullable();
            $table->string('CDW')->nullable();
            $table->string('CD900')->nullable();
            $table->string('CD')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tajuk_pohons');
    }
};
