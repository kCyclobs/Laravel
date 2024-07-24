<?php

namespace Database\Factories;
use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Director>
 */
class DirectorFactory extends Factory
{
    protected $model = Director::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'director_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'age' => $this->faker->numberBetween(30, 70),
            'Date_of_Birth' => $this->faker->date(),
            'Nationality' => $this->faker->country(),
            'occupation' => $this->faker->randomElement(['Director']),
            'photo' => 'director/bg.jpg',
           
        ];
    }
}
