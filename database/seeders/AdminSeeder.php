<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_data = [
            'name'      => 'Admin',
            'email'     => config('app.admin_email_for_seeder'),
            'password'  => bcrypt(config('app.admin_password_for_seeder')),
            'type'      => User::TYPE_ADMIN
        ];

        User::create($admin_data);
    }
}
