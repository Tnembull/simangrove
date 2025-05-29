<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Users (optional table, assumed to be pre-existing if using Laravel auth)
        // Measurement sessions
        Schema::create('measurement_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('measurement_number');
            $table->string('observer_name');
            $table->string('category');
            $table->date('measurement_year');
            $table->timestamps();
        });

        // Plots
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('measurement_session_id')->constrained('measurement_sessions')->onDelete('cascade');
            $table->string('plot_code');
            $table->string('legal_status');
            $table->string('forest_function');
            $table->string('forest_type');
            $table->string('plant_species');
            $table->string('province');
            $table->string('regency');
            $table->string('district');
            $table->string('village');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->float('altitude')->nullable();
            $table->integer('planting_year')->nullable();
            $table->integer('age')->nullable();
            $table->float('area')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('manager_note')->nullable();
            $table->string('spacing_length')->nullable();
            $table->string('spacing_width')->nullable();
            $table->string('planting_pattern')->nullable();
            $table->timestamps();
        });

        // Plot Points
        Schema::create('plot_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->constrained('plots')->onDelete('cascade');
            $table->string('point_name');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->timestamps();
        });

        // Reference Points
        Schema::create('reference_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->constrained('plots')->onDelete('cascade');
            $table->string('reference_name');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->float('azimuth')->nullable();
            $table->float('distance')->nullable();
            $table->timestamps();
        });

        // Assessment Parameters
        Schema::create('assessment_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('default_value')->default('0');
            $table->timestamps();
        });

        // Assessment Results
        Schema::create('point_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_point_id')->constrained('plot_points')->onDelete('cascade');
            $table->foreignId('assessment_parameter_id')->constrained('assessment_parameters')->onDelete('cascade');
            $table->float('value')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });

        // Growth Observations
        Schema::create('growth_observations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_point_id')->constrained('plot_points')->onDelete('cascade');
            $table->string('tree_code')->nullable();
            $table->float('height')->nullable();
            $table->float('diameter')->nullable();
            $table->float('volume')->nullable();
            $table->integer('leaf_count')->nullable();
            $table->string('photo_path')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });

        // Summary Scores
        Schema::create('plot_summary_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->constrained('plots')->onDelete('cascade');
            $table->string('health_status');
            $table->float('total_score')->nullable();
            $table->json('score_details')->nullable();
            $table->enum('status', ['draft', 'reviewed', 'published'])->default('draft');
            $table->timestamps();
        });

        // Plot Documents
        Schema::create('plot_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->constrained('plots')->onDelete('cascade');
            $table->string('type')->nullable(); // photo, note, video, etc.
            $table->string('file_path');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Site Quality
        Schema::create('site_qualities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_point_id')->constrained('plot_points')->onDelete('cascade');
            $table->float('salinity')->nullable();
            $table->float('soil_ph')->nullable();
            $table->string('soil_texture')->nullable();
            $table->float('organic_content')->nullable();
            $table->float('elevation')->nullable();
            $table->float('groundwater_depth')->nullable();
            $table->timestamps();
        });

        // Fauna Observations
        Schema::create('fauna_observations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_point_id')->constrained('plot_points')->onDelete('cascade');
            $table->string('fauna_name');
            $table->string('species_code')->nullable();
            $table->string('type')->nullable(); // e.g. bird, fish, crab
            $table->integer('count')->nullable();
            $table->boolean('is_key_indicator')->default(false);
            $table->text('note')->nullable();
            $table->timestamps();
        });

        // Regeneration Records
        Schema::create('regeneration_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_point_id')->constrained('plot_points')->onDelete('cascade');
            $table->integer('seedling_count')->nullable();
            $table->integer('sapling_count')->nullable();
            $table->integer('dead_tree_count')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regeneration_records');
        Schema::dropIfExists('fauna_observations');
        Schema::dropIfExists('site_qualities');
        Schema::dropIfExists('plot_documents');
        Schema::dropIfExists('plot_summary_scores');
        Schema::dropIfExists('growth_observations');
        Schema::dropIfExists('point_assessments');
        Schema::dropIfExists('assessment_parameters');
        Schema::dropIfExists('reference_points');
        Schema::dropIfExists('plot_points');
        Schema::dropIfExists('plots');
        Schema::dropIfExists('measurement_sessions');
    }
};