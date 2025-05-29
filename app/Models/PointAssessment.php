<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointAssessment extends Model
{
    protected $fillable = ['plot_point_id', 'assessment_parameter_id', 'value', 'note'];

    public function plotPoint() {
        return $this->belongsTo(PlotPoint::class);
    }

    public function parameter() {
        return $this->belongsTo(AssessmentParameter::class, 'assessment_parameter_id');
    }
}
