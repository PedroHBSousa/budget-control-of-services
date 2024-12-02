<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 100) as $index) {
            DB::table('addresses')->insert([
                'street' => $faker->streetName,
                'number' => $faker->buildingNumber,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'zip' => $faker->postcode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
