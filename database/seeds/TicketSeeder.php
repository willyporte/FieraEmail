<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 150; $i++) {
            \DB::table('tickets')->insert(
                [
                    'name' => $faker->firstName,
                    'city' => $faker->city,
                    'email' => $faker->unique()->email,
                    'won' => $faker->randomElement(['omaggio', 'gadget','']),
                ]
            );

        } // end for
    }
}
