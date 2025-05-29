<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrowthObservation extends Model
{
    protected $fillable = ['plot_point_id', 'tree_code', 'height', 'diameter', 'volume', 'leaf_count', 'photo_path', 'note'];

    public function plotPoint() {
        return $this->belongsTo(PlotPoint::class);
    }
}
