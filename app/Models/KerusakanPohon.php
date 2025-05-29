<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerusakanPohon extends Model
{
    use HasFactory;

    protected $fillable = ['klaster_id', 'plot_id', 'pohon_id', 'dgL1', 'dgT1', 'svrt1', 'dgL2', 'dgT2', 'svrt2', 'dgL3', 'dgT3', 'svrt3'];

    public function klaster() { return $this->belongsTo(Klaster::class); }
    public function plot() { return $this->belongsTo(Plot::class); }
    public function pohon() { return $this->belongsTo(Pohon::class); }
}
