<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferencePoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'plot_id',
        'reference_name',
        'latitude',
        'longitude',
        'azimuth',
        'distance',
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
}