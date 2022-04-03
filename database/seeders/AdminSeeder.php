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
                'status' => 1,
                'verified' => 1,
                'dept_id' => 1,
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => "Sahil",
                'email' => "sahilparmar0571@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 1,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "Mayank",
                'email' => "mynk3120@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 1,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "Aakash",
                'email' => "aakash123@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 2,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "Vishal",
                'email' => "vishal789@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 2,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "Dharmesh",
                'email' => "dharmesh123@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 3,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "Kailash",
                'email' => "Kailash456@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 3,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "Mayur",
                'email' => "mayur123@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 4,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "rahul",
                'email' => "rahul56@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 4,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "yuvraj",
                'email' => "yuvraj8951@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 5,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "pushpa",
                'email' => "pushpa@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 5,
                'password' => Hash::make('123123123'),
            ],


            [
                'name' => "shilpa",
                'email' => "shilpa8951@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 6,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "ramakant",
                'email' => "ramakant@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 6,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "john",
                'email' => "john8951@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 7,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "smit",
                'email' => "smit@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 7,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "tushar",
                'email' => "tushar8951@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 8,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "swami",
                'email' => "swami@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 8,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "ramnikbhai",
                'email' => "ramnikbhai8951@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 9,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "amit",
                'email' => "amit@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 9,
                'password' => Hash::make('123123123'),
            ],

            [
                'name' => "ramesh",
                'email' => "ramesh8951@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 10,
                'password' => Hash::make('123123123'),
            ],
            [
                'name' => "hasmukh",
                'email' => "hasmukh@gmail.com",
                'role_id' => 2,
                'status' => 1,
                'verified' => 1,
                'dept_id' => 10,
                'password' => Hash::make('123123123'),
            ],


        ];
        User::insert($arr);
    }
}
