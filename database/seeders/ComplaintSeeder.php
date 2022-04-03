<?php

namespace Database\Seeders;

use App\Models\ComplaintType;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::count();
        $types = ComplaintType::count();
        $dept = Department::count();

        foreach(range(0,100) as $i){
            DB::table('complaints')->insert([
                'title' => $faker->sentence(),
                'desc' => $faker->paragraph(),
                'status' => rand(0,3),
                'u_id' => rand(2,$users),
                'ct_id' => rand(1,$types),
                'dept_id' => rand(1,$dept),
                'invoice_number' => uniqid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

}
