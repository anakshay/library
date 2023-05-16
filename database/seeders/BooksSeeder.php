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
        $randomImages =[
           ' 1fd80904ddf5f4ac26182b70be08c2f4.jpg',
           ' 2a686d06347384fa3181e7cc5bd29719.jpg',
            '3bfb34162bc2dfba41f1388184b40325.jpg',
            '9bd597af0718e840f38bfde2756651f8.jpg',
            '40a7f6c73303fb93c7180fe343668f77.jpg',
            '45e2e99892015fd135c1b5e49d16dd1b.jpg',
            '89e9bb6a7b7dbf30e1d8951660ec728b.jpg',
            '720b3aa5ff1ce55c4f3a733a3e19f4e6.jpg',
            'book-cover-page-design-1000x1000.webp
            c57263bd5fcd8894efff3ee0fe428728.jpg',
            'f2fde365fdec0da9f847ddc7290b27a1.jpg',
            '795dcb54e30561147f6352b7b57e86c1.jpg',
            '2176e8c9023d71a1bd9354da7e6c51b1.jpg',
            'book-cover-page-design-1000x1000.webp
            c57263bd5fcd8894efff3ee0fe428728.jpg',
            'f2fde365fdec0da9f847ddc7290b27a1.jpg',
            '5437f377ec9a947219976e79f8428644.jpg',
            '918481ec023a06af1eb4b58c0f4306f1.jpg',
            '2428575b423e69f3c8260565e76e581e.jpg',
            'book-cover-page-design-1000x1000.webp
            c57263bd5fcd8894efff3ee0fe428728.jpg',
            'contemporary-fiction-night-time-book-cover-design-template-1be47835c3058eb42211574e0c4ed8bf_screen.jpg',
            'd28d593e710abb257cde4a2e05aea8e6.jpg',
            '2428575b423e69f3c8260565e76e581e.jpg',
            'book-cover-page-design-1000x1000.webp
            c57263bd5fcd8894efff3ee0fe428728.jpg',
            'f2fde365fdec0da9f847ddc7290b27a1.jpg',

            
       ];
     
        for($i = 1;$i <= 20; $i++) {

        
        $data = new Books;
        $data->name = $faker->name;
        // $data->img = $faker->image('public/images/',300, 300);
        $data->img = $randomImages[rand(1, 8)];
        $data->description = $faker->paragraph(1);
        $data->genres_id  = $faker->randomElement($users2);
        $data->categories_id = $faker->randomElement($users);
        $data->save();
        }
    }
}
