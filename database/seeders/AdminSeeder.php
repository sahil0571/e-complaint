<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'role_id' => 1,
                'verified' => 1,
                'password' => Hash::make('admin123'),
            ],
        ];
        User::insert($arr);
    }
}
