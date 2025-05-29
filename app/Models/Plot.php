<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    protected $fillable = [
        'measurement_session_id', 'plot_code', 'legal_status', 'forest_function',
        'forest_type', 'plant_species', 'province', 'regency', 'district', 'village',
        'latitude', 'longitude', 'altitude', 'planting_year', 'age', 'area',
        'manager_name', 'manager_note', 'spacing_length', 'spacing_width', 'planting_pattern'
    ];

    public function measurementSession() {
        return $this->belongsTo(MeasurementSession::class);
    }

    public function points() {
        return $this->hasMany(PlotPoint::class);
    }

    public function referencePoints() {
        return $this->hasMany(ReferencePoint::class);
    }

    public function summaryScores() {
        return $this->hasOne(PlotSummaryScore::class);
    }

    public function documents() {
        return $this->hasMany(PlotDocument::class);
    }
}
