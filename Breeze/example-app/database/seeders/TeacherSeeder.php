<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        Teacher::factory()->count(20)->create();
    // $data=[
    //     [ 
    //         'name' => Str::random(10),
    //         'email' => Str::random(10).'@example.com',
    //         'address' =>Str::random(10),
    //     ],
    //     [ 
    //         'name' => Str::random(10),
    //         'email' => Str::random(10).'@example.com',
    //         'address' =>Str::random(10),
    //     ],
    //     [ 
    //         'name' => Str::random(10),
    //         'email' => Str::random(10).'@example.com',
    //         'address' =>Str::random(10),
    //     ],
    //     [ 
    //         'name' => Str::random(10),
    //         'email' => Str::random(10).'@example.com',
    //         'address' =>Str::random(10),
    //     ],
    //     [ 
    //         'name' => Str::random(10),
    //         'email' => Str::random(10).'@example.com',
    //         'address' =>Str::random(10),
    //     ],
    //     [ 
    //         'name' => Str::random(10),
    //         'email' => Str::random(10).'@example.com',
    //         'address' =>Str::random(10),
    //     ],
       
    // ];
    // DB::table('teachers')->insert($data);
    }
}
