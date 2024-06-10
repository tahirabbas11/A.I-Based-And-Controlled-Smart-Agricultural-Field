<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'name' => 'super',
            'role' => 0,
            'email' => 'info@super.com',
            'password' => bcrypt('super123'),
        ]);
        $admin = User::create([
            'name' => 'admin',
            'role' => 1,
            'email' => 'info@admin.com',
            'password' => bcrypt('@Admin!23#'),
        ]);
        $user = User::create([
            'name' => 'user',
            'role' => 2,
            'email' => 'info@user.com',
            'password' => bcrypt('secret'),
        ]);

        $super->assignRole('super admin');
        $admin->assignRole('admin');
        $user->assignRole('customer');

    }
}
