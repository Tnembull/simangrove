<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat daftar permission
        $permissions = [
            'manage users',
            'input data',
            'review data',
            'view report',
            'manage master',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 2. Buat role
        $admin     = Role::firstOrCreate(['name' => 'Admin']);
        $surveyor  = Role::firstOrCreate(['name' => 'Surveyor']);
        $pengelola = Role::firstOrCreate(['name' => 'Pengelola']);

        // 3. Assign permissions ke role
        $admin->syncPermissions(Permission::all());
        $surveyor->syncPermissions(['input data']);
        $pengelola->syncPermissions(['review data', 'view report']);

        // 4. Buat user dan assign role
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@mangrove.test'],
            [
                'name' => 'Admin',
                'last_name' => 'Mangrove',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
        $adminUser->assignRole($admin);

        $surveyorUser = User::firstOrCreate(
            ['email' => 'surveyor@mangrove.test'],
            [
                'name' => 'Surveyor',
                'last_name' => 'Lapangan',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
        $surveyorUser->assignRole($surveyor);

        $pengelolaUser = User::firstOrCreate(
            ['email' => 'pengelola@mangrove.test'],
            [
                'name' => 'Pengelola',
                'last_name' => 'Data',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
        $pengelolaUser->assignRole($pengelola);
    }
}
