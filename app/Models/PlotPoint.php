<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlotPoint extends Model
{
    protected $fillable = ['plot_id', 'point_name', 'latitude', 'longitude'];

    public function plot() {
        return $this->belongsTo(Plot::class);
    }

    public function assessments() {
        return $this->hasMany(PointAssessment::class);
    }

    public function growths() {
        return $this->hasMany(GrowthObservation::class);
    }

    public function siteQuality() {
        return $this->hasOne(SiteQuality::class);
    }

    public function faunaObservations() {
        return $this->hasMany(FaunaObservation::class);
    }

    public function regenerationRecord() {
        return $this->hasOne(RegenerationRecord::class);
    }
}
