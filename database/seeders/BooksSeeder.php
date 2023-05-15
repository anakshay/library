<?php

namespace Database\Seeders;

use App\Models\Books;
use App\Models\Category;
use App\Models\Genres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as fakers;
class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $faker = fakers::create();
     
        $users = Category::first()->pluck('id')->toArray();
        $users2 = Genres::first()->pluck('id')->toArray();
        for($i = 1;$i <= 20; $i++) {

        
        $data = new Books;
        $data->name = $faker->name;
        $data->img = $faker->image('public/images/',300, 300);
        $data->description = $faker->paragraph(1);
        $data->genres_id  = $faker->randomElement($users2);
        $data->categories_id = $faker->randomElement($users);
        $data->save();
        }
    }
}
