<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentParameter extends Model
{
    protected $fillable = ['name', 'default_value'];

    public function assessments() {
        return $this->hasMany(PointAssessment::class);
    }
}
