<?php

use Illuminate\Database\Seeder;
use App\Ad;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('ads')->delete();

        $faker = Faker\Factory::create('en_AU');

        $categoriesData = ["Art", "Transport", "Books", "Music", "Games", "Clothing", "Community", "Electronics", "Computer", "Tickets", "Home", "Garden", "Jobs"];

        foreach ($categoriesData as $value) {
            Ad::create(array(
                'user_id' => (int) rand(1, 4),
                'category_name' => $value,
                'title' => ucfirst($faker->realText(30)),
                'location' => $faker->streetSuffix() .' '. $faker->cityPrefix() .', '. $faker->stateAbbr .', Australia',
                'image-url' => $faker->imageUrl($width = 800, $height = 400, 'cats'),
                'want' => $faker->word,
                'give' => $faker->word,
                'body' => $faker->realText(200),
            ));
        }
    }
}
