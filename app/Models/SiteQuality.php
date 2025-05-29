<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteQuality extends Model
{
    protected $fillable = ['plot_point_id', 'salinity', 'soil_ph', 'soil_texture', 'organic_content', 'elevation', 'groundwater_depth'];

    public function plotPoint() {
        return $this->belongsTo(PlotPoint::class);
    }
}
