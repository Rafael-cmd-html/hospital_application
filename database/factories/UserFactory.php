<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'phone_number' => fake()->phoneNumber(),
            'role' => fake()->randomElement(['administrator', 'receptionist']),
        ];
    }

    public function administrator(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'administrator',
            ];
        });
    }

    public function receptionist(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'receptionist',
            ];
        });
    }
}
