<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiTanah extends Model
{
    use HasFactory;

    protected $fillable = ['klaster_id', 'titik_sampel', 'penutupan_tanah', 'tekstur_tanah', 'ketebalan_cm', 'lintang', 'bujur'];

    public function klaster() { return $this->belongsTo(Klaster::class); }
}
