<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Daftar lengkap permission modular
        $permissions = [
            'manage users',
            'manage master',
            'input data',
            'edit data',
            'delete data',
            'review data',
            'verify session',
            'view report',
            'export report',
            'access dashboard',
            'edit plot',
            'manage reference data',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 2. Roles
        $admin     = Role::firstOrCreate(['name' => 'Admin']);
        $surveyor  = Role::firstOrCreate(['name' => 'Surveyor']);
        $pengelola = Role::firstOrCreate(['name' => 'Pengelola']);

        // 3. Assign modular permission per role
        $admin->syncPermissions($permissions);

        $surveyor->syncPermissions([
            'input data',
            'edit data',
            'delete data',
            'access dashboard',
        ]);

        $pengelola->syncPermissions([
            'review data',
            'verify session',
            'view report',
            'export report',
            'edit plot',
            'access dashboard',
        ]);

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
        $adminUser->assignRole('Admin');

        $surveyorUser = User::firstOrCreate(
            ['email' => 'surveyor@mangrove.test'],
            [
                'name' => 'Surveyor',
                'last_name' => 'Lapangan',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
        $surveyorUser->assignRole('Surveyor');

        $pengelolaUser = User::firstOrCreate(
            ['email' => 'pengelola@mangrove.test'],
            [
                'name' => 'Pengelola',
                'last_name' => 'Data',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
        $pengelolaUser->assignRole('Pengelola');
    }
}