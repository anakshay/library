<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BooksSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $faker = fakers::create();
        // for($i = 0;$i <= 6; $i++) {

        
        // $data = new Books;
        // $data->name = $faker->name;
        // $data->description = $faker->paragraph;
        // $data->save();

        $this->call([
            CategorySeeder::class,
            GenresSeeder::class,
            AuthorsSeeder::class,
            BooksSeeder::class,
            AuthorBookSeeder::class

        ]);
      
    }
}
