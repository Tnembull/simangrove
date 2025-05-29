<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MeasurementSession;
use App\Models\Plot;
use App\Models\PlotPoint;

class MeasurementSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'admin@mangrove.test'
        ], [
            'name' => 'Admin',
            'last_name' => 'Mangrove',
            'password' => 'password',
            'email_verified_at' => now(),
        ]);

        $session = MeasurementSession::create([
            'user_id' => $user->id,
            'measurement_number' => 1,
            'observer_name' => 'Dr. Mangrove',
            'category' => 'Baseline',
            'measurement_year' => now()->format('Y-m-d'),
        ]);

        $plot = Plot::create([
            'measurement_session_id' => $session->id,
            'plot_code' => 'PLT001',
            'legal_status' => 'Protected',
            'forest_function' => 'Conservation',
            'forest_type' => 'Mangrove',
            'plant_species' => 'Rhizophora',
            'province' => 'Lampung',
            'regency' => 'Pesawaran',
            'district' => 'Padang Cermin',
            'village' => 'Gebang',
            'latitude' => -5.1234567,
            'longitude' => 105.1234567,
            'planting_year' => 2015,
            'age' => 9,
            'area' => 1.25,
        ]);

        PlotPoint::create([
            'plot_id' => $plot->id,
            'point_name' => 'Point A',
            'latitude' => -5.1234567,
            'longitude' => 105.1234567,
        ]);
    }
}