<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pohon extends Model
{
    use HasFactory;

    protected $fillable = ['klaster_id', 'plot_id', 'jenis_id', 'no_pohon', 'azimuth', 'jarak', 'diameter_cm', 'tinggi_m'];

    public function klaster() { return $this->belongsTo(Klaster::class); }
    public function plot() { return $this->belongsTo(Plot::class); }
    public function jenis() { return $this->belongsTo(Jenis::class); }
}
