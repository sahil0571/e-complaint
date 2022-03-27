<?php

namespace Database\Seeders;

use App\Models\ComplaintType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
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
                'name' => "Faculty"
            ],
            [
                'name' => "Study"
            ],
            [
                'name' => "Fees"
            ],
            [
                'name' => "Services"
            ],
            [
                'name' => "Ragging/Bully"
            ],
            [
                'name' => "Other"
            ],
        ];
        ComplaintType::insert($arr);
    }
}
