<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' => Str::random(10),
            'address' => Str::random(10),
            
        ]);
    }
}
