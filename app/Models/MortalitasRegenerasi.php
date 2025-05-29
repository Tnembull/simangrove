<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MortalitasRegenerasi extends Model
{
    use HasFactory;

    protected $fillable = ['klaster_id', 'plot_id', 'jenis_id', 'no', 'jumlah_mati_ka', 'jumlah_lain_ll', 'jumlah_regenerasi'];

    public function klaster() { return $this->belongsTo(Klaster::class); }
    public function plot() { return $this->belongsTo(Plot::class); }
    public function jenis() { return $this->belongsTo(Jenis::class); }
}
