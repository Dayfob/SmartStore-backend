<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        for ($i = 0; $i <= 100; $i++) {
            DB::table('user_users')->insert([
                'name'              => trim($faker->firstNameMale, '\n') . ' ' . trim($faker->lastName, '\n'),
                'email'             => trim($faker->email),
                'email_verified_at' => $faker->dateTimeThisYear,
                'password'          => trim($faker->password),
                'phone_number'      => trim($faker->phoneNumber),
            ]);
        }
    }
}
