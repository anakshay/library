<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as fakers;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fakers::create();
        for($i = 1;$i <= 4; $i++) {

        
        $data = new Category;
        $data->name = $faker->randomElement(['hindi', 'english','korean','sanskrit']);
        $data->save();
        }
    }
}
