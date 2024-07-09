<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'view dashboard',
            'manage users',
            'edit profile',
            // Add other admin-specific permissions as needed
        ];

        // Create permissions
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        // Create admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Assign permissions to admin role
        $adminRole->syncPermissions(Permission::all());

        // Create or find admin user by email
        $adminEmail = 'admin@gmail.com';
        $admin = User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Admin', // Change name as needed
                'password' => Hash::make('password') // Change password as needed
            ]
        );

        // Assign admin role to the user
        $admin->assignRole($adminRole);

        
    }
}