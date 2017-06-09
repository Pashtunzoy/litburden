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

        $faker = Faker\Factory::create();


        for($i = 0; $i < 10; $i++){
            Ad::create(array(
                'user_id' => (int) rand(1, 4),
                'category_id' => (int) rand(1, 13),
                'title' => $faker->sentence,
                'location' => $faker->streetSuffix .' '. $faker->cityPrefix() .', '. $faker->stateAbbr .', '. $faker->country,
                'image-url' => $faker->imageUrl($width = 800, $height = 400, 'cats'),
                'want' => $faker->word,
                'give' => $faker->word,
                'body' => $faker->paragraph(3),
            ));
        }
    }
}
