<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = ['klaster_id', 'no_plot', 'lintang', 'bujur'];

    public function klaster() { return $this->belongsTo(Klaster::class); }
    public function pohons() { return $this->hasMany(Pohon::class); }
}
