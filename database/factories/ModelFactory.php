<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});



/* Columns for the Post factory Model
    $table->string('user_id');
    $table->string('title');
    $table->string('location');
    $table->string('image-url');
    $table->string('want');
    $table->string('give');
    $table->text('body');
 */

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => (int) rand(1, 10),
        'title' => $faker->name,
        'location' => $faker->streetSuffix .' '. $faker->cityPrefix() .', '. $faker->stateAbbr .', '. $faker->country,
        'image-url' => $faker->imageUrl($width = 800, $height = 400, 'cats'),
        'want' => $faker->word,
        'give' => $faker->word,
        'body' => $faker->paragraph(3),
    ];
});
