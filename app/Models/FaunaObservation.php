<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaunaObservation extends Model
{
    protected $fillable = ['plot_point_id', 'fauna_name', 'species_code', 'type', 'count', 'is_key_indicator', 'note'];

    public function plotPoint() {
        return $this->belongsTo(PlotPoint::class);
    }
}
