<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasurementSession extends Model
{
    protected $fillable = [
        'user_id', 'measurement_number', 'observer_name', 'category', 'measurement_year'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function plots() {
        return $this->hasMany(Plot::class);
    }
}
