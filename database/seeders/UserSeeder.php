<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'phone_number' => "+6285888372505",
                'status' => $faker->randomElement(['Visitor', 'Member']),
                'dob' => $faker->date,
                'occupation' => $faker->jobTitle,
                'domicile' => $faker->city,
                'cell_group' => $faker->boolean,
                'know_us_from' => $faker->randomElement(['Family', 'Social Media', 'Friend', 'Others']),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // create for admin
        for($i = 1; $i <= 1; $i++) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@gbi.com',
                'password' => Hash::make('12345'),
                'is_admin' => true
            ]);
        }
    }
}
