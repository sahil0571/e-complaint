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
            ['role_name' => 'admin' , 'description' => 'Has all previlenges' ],
            ['role_name' => 'user' , 'description' => 'General Users.' ],
            ['role_name' => 'headquarter' , 'description' => 'headquarter Users.' ],
            ['role_name' => 'station' , 'description' => 'station Users.' ],
            ['role_name' => 'police' , 'description' => 'police Users.' ],
            ['role_name' => 'criminals' , 'description' => 'Criminals.' ],
        ];

        Role::insert($roles);
    }
}
