<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('posts')->delete();

        $faker = Faker\Factory::create();


        for($i = 0; $i < 10; $i++){
            Post::create(array(
                'user_id' => (int) rand(1, 5),
                'title' => $faker->sentence,
                'location' => $faker->streetSuffix .' '. $faker->cityPrefix() .', '. $faker->stateAbbr .', '. $faker->country,
                'image-url' => $faker->imageUrl($width = 800, $height = 400, 'cats'),
                'email' => $faker->email,
                'want' => $faker->word,
                'give' => $faker->word,
                'body' => $faker->paragraph(3),
            ));
        }
    }
}
