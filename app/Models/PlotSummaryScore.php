<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlotSummaryScore extends Model
{
    protected $fillable = ['plot_id', 'health_status', 'total_score', 'score_details', 'status'];

    protected $casts = ['score_details' => 'array'];

    public function plot() {
        return $this->belongsTo(Plot::class);
    }
}
