<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_name' => $this->faker->name,
            'employee_email' => $this->faker->email,
            'employee_phone' => '0123456789',
            'username' => $this->faker->userName,
            'password' => bcrypt('123456'),
            'role' => 1,
        ];
    }
}
