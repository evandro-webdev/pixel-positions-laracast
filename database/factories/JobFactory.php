<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'employer_id' => Employer::factory(),
      'title' => fake()->jobTitle(),
      'salary' => fake()->randomElement(['$20,000 USD', '$30,000 USD', '$50,000 USD', '$80,000 USD']),
      'location' => 'Remote',
      'schedule' => fake()->randomElement(['Full Time', 'Part Time']),
      'url' => fake()->url(),
    ];
  }
}
