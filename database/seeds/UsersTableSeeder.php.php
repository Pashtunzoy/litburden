<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

           DB::table('users')->delete();

           $faker = Faker\Factory::create();


           for($i = 0; $i < 2; $i++){
               User::create(array(
                   'name' => $faker->name,
                   'email' => $faker->unique()->safeEmail,
                   'password' => bcrypt('secret'),
                   'remember_token' => str_random(10),
               ));
           }

           User::create(array(
               'name' => $faker->name,
               'email' => $faker->unique()->safeEmail,
               'password' => bcrypt('secret'),
               'remember_token' => str_random(10),
           ));
    }
}
