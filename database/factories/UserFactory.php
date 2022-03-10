<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @param $factory
     * @return array
     */
    public function definition()
    {
//        return [
//            'name' => $this->faker->name(),
//            'email' => $this->faker->unique()->safeEmail(),
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'remember_token' => Str::random(10),
//        ];
    }

    public function factory(Faker $faker) {
            return [
                'name' => $faker->name,
                'email' => $faker->email,
                'email_verified_at' => $faker->time,
                'password' => $faker->password,
                'iin' => random_int(10, 99) . random_int(01, 12) . random_int(01, 31) . random_int(1, 6) . random_int(10000, 99999),
                'phone_number' => $faker->phoneNumber,
            ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
