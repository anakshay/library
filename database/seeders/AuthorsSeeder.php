<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as fakers;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fakers::create();
        for($i = 1;$i <= 10; $i++) {

        
        $data = new Authors;
        $data->name = $faker->name;
        $data->email = $faker->email;
        $data->save();
        }
    }
}
