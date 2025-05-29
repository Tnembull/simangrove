<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegenerationRecord extends Model
{
    protected $fillable = ['plot_point_id', 'seedling_count', 'sapling_count', 'dead_tree_count', 'note'];

    public function plotPoint() {
        return $this->belongsTo(PlotPoint::class);
    }
}
