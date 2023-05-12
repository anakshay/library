<?php

namespace Database\Seeders;

use App\Models\Genres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as fakers;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fakers::create();
        for($i = 1;$i <= 4; $i++) {

        
        $data = new Genres;
        $data->name = $faker->randomElement(['funny', 'romantic','horror','adventure']);
        $data->save();
        }
    }
}
