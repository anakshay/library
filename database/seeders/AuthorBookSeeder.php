<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as fakers;
use App\Models\AuthorsBooks;
use App\Models\Books;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data1 = Books::first()->pluck('id')->toArray();
        $data2 = Authors::first()->pluck('id')->toArray();
        $faker = fakers::create();
        $data = Books::count();
        for($i = 1;$i <= 20; $i++) {

        
        $data = new AuthorsBooks;
        $data->books_id = $faker->randomElement($data1);
        $data->authors_id = $faker->randomElement($data2);
        
        $data->save();
        }
    }
}
