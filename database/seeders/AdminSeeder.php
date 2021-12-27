<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'name' => "Admin",
                'email' => "admin@e-complaint.com",
                'phone' => "0123456789",
                'role_id' => 1,
                'status' => 1,
                'password' => Hash::make('admin123'),

            ],
        ];
        User::insert($arr);
    }
}
