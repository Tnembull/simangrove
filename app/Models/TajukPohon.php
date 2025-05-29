<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TajukPohon extends Model
{
    use HasFactory;

    protected $fillable = ['klaster_id', 'plot_id', 'pohon_id', 'LCR', 'Cden', 'FT', 'CDB', 'CDW', 'CD900', 'CD'];

    public function klaster() { return $this->belongsTo(Klaster::class); }
    public function plot() { return $this->belongsTo(Plot::class); }
    public function pohon() { return $this->belongsTo(Pohon::class); }
}
