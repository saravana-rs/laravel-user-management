<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Avoid duplicate admin
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'user_name' => 'Admin User',
                'email'     => 'admin@example.com',
                'mobile'    => '9999999999',
                'dob'       => '1990-01-01',
                'gender'    => 'Male',
                'password'  => Hash::make('admin@123'), 
                'role'      => 'admin',
                'address1'  => json_encode([
                    'door_street' => 'Admin Street',
                    'city'        => 'Admin City',
                    'landmark'    => 'Admin HQ',
                    'state'       => 'Admin State',
                    'country'     => 'AdminLand',
                    'primary'     => true,
                ]),
                'address2'  => json_encode([]),
            ]);
        }
    }
}
