<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('categories')->delete();

        $categoriesData = ["Art", "Transport", "Books", "Music", "Games", "Clothing", "Community", "Electronics", "Computer", "Tickets", "Home", "Garden", "Jobs"];

        for ($i=0; $i < $categoriesData; $i++) {
            Category::create([ 'name' => $categoriesData[$i] ]);
        }
    }
}
