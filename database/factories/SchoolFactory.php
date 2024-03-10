<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_name' => $this->faker->name,
            'school_logo' => $this->faker->imageUrl($width = 640, $height = 480), // Example for generating a fake image URL
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'name_headmaster' => $this->faker->name,
            'phone_number_headmaster' => $this->faker->phoneNumber,
            'school_city' => $this->faker->city,
            'adresse' => $this->faker->address,
            'description' => $this->faker->paragraph,

        ];
    }
}
