<?php

use Illuminate\Database\Seeder;

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
                   'username' => $faker->userName,
                   'password' => Hash::make($faker->name . $faker->year),
                   'name' => $faker->name,
                   'lastname' => $faker->lastName
               ));
           }

           User::create(array(
               'username' => 'foo',
               'password' => Hash::make('password'),
               'name' => $faker->name,
               'lastname' => $faker->lastName
           ));
    }
}
