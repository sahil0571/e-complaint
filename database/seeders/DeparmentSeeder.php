<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeparmentSeeder extends Seeder
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
                'name' => 'Batchlor of Computer Applications',
                'description' => 'Bachelor of Computer Applications (BCA) is a three-year undergraduate degree course in computer applications. Bachelor of Computer Applications (BCA) is one of the popular courses among the students who want to jumpstart their career in the field of information technology.',
                "status" => 1
            ],
            [
                'name' => 'Batchlor of Bussiness Administration',
                'description' => "The Bachelor of Business Administration (BBA) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 0
            ],
        ];

        Department::insert($arr);
    }
}
