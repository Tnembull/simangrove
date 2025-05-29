<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kerusakan_pohons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klaster_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pohon_id')->constrained()->cascadeOnDelete();
            $table->string('dgL1')->nullable();
            $table->string('dgT1')->nullable();
            $table->string('svrt1')->nullable();
            $table->string('dgL2')->nullable();
            $table->string('dgT2')->nullable();
            $table->string('svrt2')->nullable();
            $table->string('dgL3')->nullable();
            $table->string('dgT3')->nullable();
            $table->string('svrt3')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kerusakan_pohons');
    }
};
