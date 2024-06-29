<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Role::where('name', 'super admin')->exists()) {
            Role::create(['name' => 'super admin']);
        }

        $user = User::create([
            'name' => 'super admin',
            'email' => 'admin@example.com', // Change this to the desired email
            'password' => bcrypt('123456'), // Change 'password' to the desired password
        ]);

        // Assign the 'super admin' role to the user
        $role = Role::findByName('super admin');
        $user->assignRole($role);
    }
}
