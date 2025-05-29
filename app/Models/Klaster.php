<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klaster extends Model
{
    use HasFactory;

    protected $fillable = ['pengukuran_ke', 'desa', 'kecamatan', 'kabupaten', 'bentuk_lahan', 'titik_koordinat', 'altitude', 'tahun_tanam', 'umur', 'luas_ha', 'nama_petani', 'jarak_tanam', 'pola_tanam', 'jenis_tanaman'];

    public function titikIkat() { return $this->hasMany(TitikIkat::class); }
    public function plots() { return $this->hasMany(Plot::class); }
    public function pohons() { return $this->hasMany(Pohon::class); }
    public function kondisiTanah() { return $this->hasMany(KondisiTanah::class); }
    public function mortalitasRegenerasi() { return $this->hasMany(MortalitasRegenerasi::class); }
    public function keanekaragaman() { return $this->hasMany(Keanekaragaman::class); }
    public function kerusakanPohon() { return $this->hasMany(KerusakanPohon::class); }
    public function tajukPohon() { return $this->hasMany(TajukPohon::class); }
}
