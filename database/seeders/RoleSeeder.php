<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            ['role_name' => 'Admin' , 'description' => 'Has all previlenges' ],
            ['role_name' => 'User' , 'description' => 'General Users.' ],
            ['role_name' => 'Headquarter' , 'description' => 'headquarter Users.' ],
            ['role_name' => 'Station' , 'description' => 'station Users.' ],
            ['role_name' => 'Police' , 'description' => 'police Users.' ],
            ['role_name' => 'Criminals' , 'description' => 'Criminals.' ],
        ];

        Role::insert($roles);
    }
}
