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
                'name' => 'All',
                's_name' => 'all',
                'description' => 'regarding to  all students',
                "status" => 0
            ],

            [
                'name' => 'Bachelor of Computer Applications',
                's_name' => 'BCA',
                'description' => 'Bachelor of Computer Applications (BCA) is a three-year undergraduate degree course in computer applications. Bachelor of Computer Applications (BCA) is one of the popular courses among the students who want to jumpstart their career in the field of information technology.',
                "status" => 1
            ],

            [
                'name' => 'Master of Computer Applications',
                's_name' => 'MCA',
                'description' => 'Master of Computer Applications (MCA) is a three-year undergraduate degree course in computer applications. Bachelor of Computer Applications (BCA) is one of the popular courses among the students who want to jumpstart their career in the field of information technology.',
                "status" => 1
            ],

            [
                'name' => 'Bachelor of Bussiness Administration',
                's_name' => 'BBA',
                'description' => "The Bachelor of Business Administration (BBA) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],

            [
                'name' => 'Master of Bussiness Administration',
                's_name' => 'MBA',
                'description' => "The Master of Business Administration (MBA) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],
            [
                'name' => 'Bachelor of Technology',
                's_name' => 'B.Tech',
                'description' => "The Bachelor of Technology (B.Tech) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],

            [
                'name' => 'Master of Technology',
                's_name' => 'M.Tech',
                'description' => "The Master of Technology (M.Tech) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],
            [
                'name' => 'Bachelor of Science (Computer)',
                's_name' => 'B.Sc',
                'description' => "The Bachelor of Science (B.sc) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],

            [
                'name' => 'Master of Science (Computer)',
                's_name' => 'M.Sc',
                'description' => "The Master of Science (M.sc) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],

            [
                'name' => 'Bachelor of Commerce',
                's_name' => 'B.Com',
                'description' => "The Bachelor of Commerce (B.Com) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],

            [
                'name' => 'Master of Commerce',
                's_name' => 'M.Com',
                'description' => "The Master of Commerce (M.Com) is a bachelor's degree in business administration. In the United States, the degree is conferred after four years of full-time study in one or more areas of business concentrations.",
                "status" => 1
            ],
        ];

        Department::insert($arr);
    }
}
