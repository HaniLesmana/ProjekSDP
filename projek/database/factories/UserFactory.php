<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_email" => $this->faker->unique()->safeEmail(),
            "user_nama" => $this->faker->name(),
            "user_telepon" => $this->faker->phoneNumber(),
            "user_alamat" => $this->faker->address(),
            "password" => bcrypt('12345678'),
            "user_saldo" => 2000000,
            "user_poin" => $this->faker->numberBetween(0, 100),
        ];
    }
}
