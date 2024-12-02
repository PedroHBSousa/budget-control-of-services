<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Obter o ID do único usuário criado
        $userId = DB::table('users')->where('email', 'test@example.com')->value('id');

        // Obter IDs dos endereços
        $addressIds = DB::table('addresses')->pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->phoneNumber,
                'user_id' => $userId,
                'addresses_id' => $faker->randomElement($addressIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
