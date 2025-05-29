<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitikIkat extends Model
{
    use HasFactory;

    protected $fillable = ['klaster_id', 'nama_titik_ikat', 'azimuth', 'jarak', 'lintang', 'bujur'];

    public function klaster() { return $this->belongsTo(Klaster::class); }
}
