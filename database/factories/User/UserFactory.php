<?php

namespace Database\Factories\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'Alexander Pushkin',
            'email' => 'semembaevalihan19@gmail.com',
            'password' => Hash::make('password'),
            'employer' => false,
        ];
    }

    public function factory(Faker $faker)
    {
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
     * @return Factory
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
