<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlotDocument extends Model
{
    protected $fillable = ['plot_id', 'type', 'file_path', 'description'];

    public function plot() {
        return $this->belongsTo(Plot::class);
    }
}
