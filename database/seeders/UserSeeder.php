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
        $faker = Factory::create('App\Models\User');
        for ($i = 0; $i <= 100; $i++) {
            DB::table('users')->insert([
                'name'              => $faker->name,
                'email'             => $faker->email,
                'email_verified_at' => $faker->dateTimeThisYear,
                'password'          => $faker->password,
                'phone_number'      => $faker->phoneNumber,
            ]);
        }
    }
}
