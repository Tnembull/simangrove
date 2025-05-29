<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssessmentParameter;

class AssessmentParameterSeeder extends Seeder
{
    public function run(): void
    {
        $parameters = [
            'Productivity',
            'Vitality',
            'Site Quality',
            'Biodiversity (Flora)',
            'Biodiversity (Fauna)',
            'Regeneration'
        ];

        foreach ($parameters as $name) {
            AssessmentParameter::firstOrCreate(['name' => $name], ['default_value' => 0]);
        }
    }
}